<?php

namespace App\Domain\Pools\Domain\Coordinators;

use App\Domain\Pools\Domain\Services\BlockFrostSyncService;
use App\Domain\Pools\Infrastructure\Repository\PoolRepository;

class PoolCoordinator
{
    public function __construct(
        private BlockFrostSyncService $blockFrostSync,
        private PoolRepository $poolRepository,
    ) {
    }

    /**
     * @return void
     */
    public function syncAllPoolDataFromBlockFrost(): void
    {
        $pools = $this->blockFrostSync->retrievePools();
        $this->blockFrostSync->updatePoolList($pools);

        foreach ($pools as $pool) {
            $this->blockFrostSync->extractPoolData($pool->getId(), true);
        }
    }

    public function syncPoolsFromFromBlockFrost(): void
    {
        $pools = $this->blockFrostSync->retrievePools();
        $this->blockFrostSync->updatePoolList($pools);
    }

    public function syncPoolDetailsFromBlockFrost()
    {
        $this->poolRepository->createQuery()->chunk(50, function ($poolChunk) {
            foreach ($poolChunk as $pool) {
                // Collect stake/block data for pools without any metadata
                $this->blockFrostSync->extractPoolData($pool['id'], false);
            }
        });
    }

    public function syncPoolMetaDataFromBlockFrost()
    {
        $this->poolRepository->createQuery()->chunk(50, function ($poolChunk) {
            foreach ($poolChunk as $pool) {
                // Collect metadata for each Pool (e.g. name, website, ticker etc.)
                $this->blockFrostSync->extractPoolMetaData($pool['id']);
            }
        });
    }

    /* public function syncPoolsFromAdaPools(): void
    {
        $response = $this->adaPoolsClient->get('/pools.json');

        if (!$response->isSuccessful()) {
            throw new RuntimeException(
                sprintf(
                    'Unexpected error while syncing pools: %s',
                    $response->getResponse()->getBody()
                )
            );
        }

        $pools = $response->getData();
        // $this->poolRepository->updatePools($pools);
        // TODO: Incomplete as the data is not well-formatted/easy to consume
    } */
}
