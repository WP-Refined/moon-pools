<?php

namespace App\Domain\Pools\Application\Jobs;

use App\Domain\Pools\Domain\Coordinators\PoolCoordinator;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

class SyncPoolsJob implements ShouldQueue, ShouldBeUnique
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
        if (!config('gateways.blockfrost.pool_list_sync')) {
            return;
        }

        try {
            $coordinator->syncPoolsFromFromBlockFrost();
        } catch (Exception $e) {
            $this->fail($e);
        }
    }
}
