<?php

namespace App\Domain\Pools\Domain\Services;

use App\Domain\Pools\Domain\Client\BlockFrostClient;
use App\Domain\Pools\Domain\DTO\PoolDetailDto;
use App\Domain\Pools\Domain\DTO\PoolDto;
use App\Domain\Pools\Infrastructure\Repository\PoolDetailRepository;
use App\Domain\Pools\Infrastructure\Repository\PoolRepository;
use RuntimeException;

class BlockFrostSyncService
{
    public function __construct(
        private PoolRepository $poolRepository,
        private PoolDetailRepository $poolDetailRepository,
        private BlockFrostClient $blockFrostClient
    ) {
    }

    /**
     * Retrieve an array of Pools we can track internally
     *
     * @return PoolDto[]
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

        $pools = [];
        foreach ($response->getData() as $poolData) {
            $pools[] = (new PoolDto())
                ->setId($poolData['pool_id'])
                ->setHex($poolData['hex']);
        }

        return $pools;
    }

    /**
     * Fetch and upsert a single Pools data
     *
     * @param  string  $poolId
     * @param  bool  $includeMetaData  Data is not frequently updated. Set to false to improve request quota.
     * @return void
     */
    public function extractPoolData(
        string $poolId,
        bool $includeMetaData = true
    ): void {
        $poolDetailDto = new PoolDetailDto();
        $poolDetailDto->setId($poolId);

        // First API call to retrieve the primary pool details
        $poolResponse = $this->blockFrostClient->get(sprintf('pools/%s', $poolId));
        if ($poolResponse->isSuccessful()) {
            $poolData = $poolResponse->getData();
            $poolDetailDto
                ->setHex($poolData['hex'])
                ->setVrfKey($poolData['vrf_key'])
                ->setBlocksMinted($poolData['blocks_minted'])
                ->setBlocksEpoch($poolData['blocks_epoch'])
                ->setLiveStake($poolData['live_stake'])
                ->setLiveSize($poolData['live_size'])
                ->setLiveSaturation($poolData['live_saturation'])
                ->setLiveDelegators($poolData['live_delegators'])
                ->setActiveStake($poolData['active_stake'])
                ->setActiveSize($poolData['active_size'])
                ->setDeclaredPledge($poolData['declared_pledge'])
                ->setLivePledge($poolData['live_pledge'])
                ->setMarginCost($poolData['margin_cost'])
                ->setFixedCost($poolData['fixed_cost'])
                ->setRewardAccount($poolData['reward_account'])
                ->setOwners($poolData['owners'])
                ->setRegistration($poolData['registration'])
                ->setRetirement($poolData['retirement']);
        }

        // Limit metadata fetch as required (data returned is not updated as frequently)
        if ($includeMetaData) {
            $metaResponse = $this->blockFrostClient->get(sprintf('pools/%s/metadata', $poolId));
            if ($metaResponse->isSuccessful()) {
                $metaData = $metaResponse->getData();
                $poolDetailDto
                    ->setName($metaData['name'])
                    ->setTicker($metaData['ticker'])
                    ->setDescription($metaData['description'])
                    ->setWebsite($metaData['homepage'])
                    ->setRefUrl($metaData['url'])
                    ->setRefHash($metaData['hash']);
            }
        }

        // Assume that if a request returns no data or fails at this point
        // we just need to try again in the next cron run
        $result = $this->poolDetailRepository->upsert($poolDetailDto->toArray(true));

        if (!$result) {
            throw new RuntimeException(sprintf(
                'Unexpected error while syncing pool data: %s',
                json_encode($poolDetailDto->toArray())
            ));
        }
    }

    /**
     * Fetch and upsert a single Pool Metadata (e.g. Pool name, socials etc.)
     *
     * @param  string  $poolId
     * @return void
     */
    public function extractPoolMetaData(string $poolId)
    {
        $poolDetailDto = new PoolDetailDto();
        $poolDetailDto->setId($poolId);

        // Second API call to retrieve missing metadata (name, website etc.)
        $metaResponse = $this->blockFrostClient->get(sprintf('pools/%s/metadata', $poolId));
        if ($metaResponse->isSuccessful()) {
            $metaData = $metaResponse->getData();
            $poolDetailDto
                ->setName($metaData['name'])
                ->setTicker($metaData['ticker'])
                ->setDescription($metaData['description'])
                ->setWebsite($metaData['homepage'])
                ->setRefUrl($metaData['url'])
                ->setRefHash($metaData['hash']);
        }

        // Assume that if a request returns no data or fails at this point
        // we just need to try again in the next cron run
        $result = $this->poolDetailRepository->upsert($poolDetailDto->toMetaArray());

        if (!$result) {
            throw new RuntimeException(sprintf(
                'Unexpected error while syncing pool metadata: %s',
                json_encode($poolDetailDto->toArray())
            ));
        }
    }

    /**
     * Create batches of pools to insert/update in the database
     *
     * @param  PoolDto[]  $pools
     * @return void
     */
    public function updatePoolList(array $pools): void
    {
        collect($pools)
            ->map(function ($pool) {
                return [
                    'id' => $pool->getId(),
                    'hex' => $pool->getHex(),
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