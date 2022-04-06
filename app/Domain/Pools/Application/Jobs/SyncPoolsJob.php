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
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private PoolCoordinator $coordinator
    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $this->coordinator->syncPoolsFromNode();
        } catch (Exception $e) {
            $this->fail($e);
        }
    }
}
