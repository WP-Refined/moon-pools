<?php

namespace App\Domain\Pools\Application\Jobs;

use App\Domain\Pools\Domain\Coordinators\PoolCoordinator;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

class SyncPoolDetailsJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PoolCoordinator $coordinator)
    {
        // Ensure that sync is enabled for the current deployment
        if (!config('gateways.blockfrost.sync_enabled')) {
            return;
        }

        try {
            $coordinator->syncPoolDetailsFromBlockFrost();
        } catch (Exception $e) {
            $this->fail($e);
        }
    }
}
