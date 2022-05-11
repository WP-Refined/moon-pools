<?php

namespace App\Domain\Network\Application\Jobs;

use App\Domain\Network\Domain\Coordinators\NetworkCoordinator;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

class SyncNetworkSupplyJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(NetworkCoordinator $coordinator)
    {
        // Ensure that sync is enabled for the current deployment
        if (!config('gateways.blockfrost.network_sync')) {
            return;
        }

        try {
            $coordinator->syncNetworkSupplyFromBlockFrost();
        } catch (Exception $e) {
            $this->fail($e);
        }
    }
}
