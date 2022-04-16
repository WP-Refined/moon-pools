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
     * Retrieve an array of Pools we can track internally
     *
     * @return array
     */
    public function retrievePools(): array
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
     * Fetch and upsert a single Pools metadata
     *
     * @param  string  $poolId
     * @param  bool  $includeMetaData  Data is not frequently updated. Set to false to improve request quota.
     * @return void
     */
    public function extractPoolMetaData(string $poolId, bool $includeMetaData = true): void
    {
        $extracted = [
            'id' => $poolId,
        ];
        $defaultEndpoint = sprintf('pools/%s', $poolId);
        $metaDataEndpoint = sprintf('pools/%s/metadata', $poolId);

        // First API call to retrieve the primary pool details
        $poolData = $this->blockFrostClient->get($defaultEndpoint);
        if ($poolData->isSuccessful()) {
            $extracted = array_merge($extracted, $poolData->getData());
        }

        // Limit metadata fetch as required (data returned is not updated as frequently)
        if ($includeMetaData) {
            // Second API call to retrieve missing metadata (name, website etc.)
            $metaData = $this->blockFrostClient->get($metaDataEndpoint);
            if ($metaData->isSuccessful()) {
                $extracted = array_merge($extracted, $metaData->getData());
            }
        }

        // Transform the extracted data we received
        $extracted = $this->mapExtractedMetaData($extracted, $includeMetaData);

        // Assume that if a request returns no data or fails at this point
        // we just need to try again in the next cron run
        $result = $this->poolRepository->upsert($extracted);

        if (!$result) {
            throw new RuntimeException(sprintf(
                'Unexpected error while syncing pool metadata: %s',
                json_encode($extracted)
            ));
        }
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

    // TODO: Replace with a PoolDetailDto
    private function mapExtractedMetaData(array $extracted, bool $includeMetaData = true): array
    {
        $availableData = [];

        if ($includeMetaData) {
            $availableData = [
                'name' => $extracted['name'],
                'ticker' => $extracted['ticker'],
                'description' => $extracted['description'],
                'website' => $extracted['homepage'],
                'ref_url' => $extracted['url'],
            ];
        }

        return array_merge($availableData, [
            'id' => $extracted['id'],
            'hex' => $extracted['hex'],
            'vrf_key' => $extracted['vrf_key'],
            'blocks_minted' => $extracted['blocks_minted'],
            'blocks_epoch' => $extracted['blocks_epoch'],
            'live_stake' => $extracted['live_stake'],
            'live_size' => $extracted['live_size'],
            'live_saturation' => $extracted['live_saturation'],
            'live_delegators' => $extracted['live_delegators'],
            'active_stake' => $extracted['active_stake'],
            'active_size' => $extracted['active_size'],
            'declared_pledge' => $extracted['declared_pledge'],
            'live_pledge' => $extracted['live_pledge'],
            'margin_cost' => $extracted['margin_cost'],
            'fixed_cost' => $extracted['fixed_cost'],
            'reward_account' => $extracted['reward_account'],
            'owners' => json_encode($extracted['owners']), // collection/json
            'registration' => json_encode($extracted['registration']), // collection/json
            'retirement' => json_encode($extracted['retirement']), // collection/json
        ]);
    }
}