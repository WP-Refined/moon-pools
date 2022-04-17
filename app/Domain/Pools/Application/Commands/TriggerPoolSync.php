<?php

namespace App\Domain\Pools\Application\Commands;

use App\Domain\Pools\Application\Jobs\SyncAllPoolDataJob;
use App\Domain\Pools\Application\Jobs\SyncPoolDetailsJob;
use App\Domain\Pools\Application\Jobs\SyncPoolMetaDataJob;
use App\Domain\Pools\Application\Jobs\SyncPoolsJob;
use App\Domain\Pools\Domain\Coordinators\PoolCoordinator;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as ConsoleCommand;

class TriggerPoolSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pools:sync 
                            {type=pools : Type of pools, details, meta, full}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually trigger a pool sync from the Cardano node.';

    public function __construct(
        private PoolCoordinator $poolCoordinator
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        switch ($this->argument('type')) {
            case 'pools':
                (new SyncPoolsJob())->handle($this->poolCoordinator);
                break;
            case 'details':
                (new SyncPoolDetailsJob())->handle($this->poolCoordinator);
                break;
            case 'meta':
                (new SyncPoolMetaDataJob())->handle($this->poolCoordinator);
                break;
            case 'full':
                (new SyncAllPoolDataJob())->handle($this->poolCoordinator);
                break;
        }

        return ConsoleCommand::SUCCESS;
    }
}
