<?php

namespace App\Domain\Pools\Domain\Coordinators;

use App\Domains\Pools\Infrastructure\Repository\PoolRepository;
use Illuminate\Database\DatabaseManager;

class PoolCoordinator
{
    public function __construct(
        private DatabaseManager $databaseManager,
        private PoolRepository $poolRepository
    ) {
    }

    public function syncPoolsFromNode()
    {
        // TODO: Call ADA Pools endpoint to excessively large json object... fun

        //
    }
}
