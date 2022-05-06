<?php

namespace App\Domain\Network\Domain\Services;

use App\Domain\Common\Domain\Client\BlockFrostClient;

class BlockFrostSyncService
{
    public function __construct(
        private BlockFrostClient $blockFrostClient
    ) {
    }

    //
}
