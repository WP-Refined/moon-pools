<?php

namespace App\Domain\Network\Domain\Coordinators;

use App\Domain\Network\Domain\Services\BlockFrostSyncService;

class NetworkCoordinator
{
    public function __construct(
        private BlockFrostSyncService $blockFrostSync
    ) {
    }

    /**
     * @return void
     */
    public function syncNetworkSupplyFromBlockFrost(): void
    {
        $networkSupply = $this->blockFrostSync->retrieveNetworkSupply();
        $this->blockFrostSync->persistNetworkSupply($networkSupply);
    }
}
