<?php

namespace App\Domain\Pools\Domain\Coordinators;

use App\Domain\Pools\Domain\Services\BlockFrostSyncService;

class PoolCoordinator
{
    public function __construct(
        private BlockFrostSyncService $blockFrostSync
    ) {
    }

    /**
     * @return void
     */
    public function syncPoolsFromBlockFrost(): void
    {
        $poolIds = $this->blockFrostSync->retrievePoolIds();
        $this->blockFrostSync->updatePoolList($poolIds);
        dd('poolIds', $poolIds);

        foreach ($poolIds as $poolId) {
            $this->blockFrostSync->extractPoolMetaData($poolId);
        }
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
