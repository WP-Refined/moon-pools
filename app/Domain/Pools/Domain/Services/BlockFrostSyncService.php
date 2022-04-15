<?php

namespace App\Domain\Pools\Domain\Services;

use App\Domain\Pools\Domain\Client\BlockFrostClient;
use App\Domain\Pools\Infrastructure\Repository\PoolRepository;
use RuntimeException;

class BlockFrostSyncService
{
    public function __construct(
        private PoolRepository $poolRepository,
        private BlockFrostClient $blockFrostClient
    ) {
    }

    /**
     * Retrieve an array of Pool Ids we can track internally
     *
     * @return array
     */
    public function retrievePoolIds(): array
    {
        $response = $this->blockFrostClient->get('pools/extended');
        if (!$response->isSuccessful()) {
            throw new RuntimeException(
                sprintf(
                    'Unexpected error while syncing available pools: %s',
                    json_encode($response->getResponse()->getBody())
                )
            );
        }

        return $response->getData();
    }

    /**
     * @param  string  $poolId
     * @return void
     */
    public function extractPoolMetaData(string $poolId): void
    {
        $extracted = [
            'id' => $poolId,
        ];
        $defaultEndpoint = sprintf('pools/%s', $poolId);
        $metaDataEndpoint = sprintf('pools/%s/metadata', $poolId);

        // First API call to retrieve the primary pool details
        $poolData = $this->blockFrostClient->get($defaultEndpoint);
        if ($poolData->isSuccessful()) {
            array_merge($extracted, $poolData->getData());
        }

        // Second API call to retrieve missing metadata (name, website etc.)
        $metaData = $this->blockFrostClient->get($metaDataEndpoint);
        if ($metaData->isSuccessful()) {
            array_merge($extracted, $metaData->getData());
        }

        // Assume that if a request returns no data or fails at this point
        // we just need to try again in the next cron run
        $this->poolRepository->upsert($extracted);
    }

    /**
     * Create batches of pools to insert/update in the database
     *
     * @param  array  $poolIds
     * @return void
     */
    public function updatePoolList(array $poolIds): void
    {
        collect($poolIds)
            ->map(function ($pool) {
                return [
                    'id' => $pool['pool_id'],
                    'pool_hex' => $pool['hex'],
                ];
            })
            ->chunk(50)
            ->each(function ($poolChunk) {
                $result = $this->poolRepository->upsert($poolChunk->toArray());

                if (!$result) {
                    throw new RuntimeException(sprintf(
                        'Unexpected error while syncing pool chunk: %s',
                        $poolChunk->toJson()
                    ));
                }
            });
    }
}