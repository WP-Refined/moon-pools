<?php

namespace App\Domain\Network\Application\Commands;

use App\Domain\Network\Application\Jobs\SyncNetworkSupplyJob;
use App\Domain\Network\Domain\Coordinators\NetworkCoordinator;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as ConsoleCommand;

class TriggerNetworkSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'network:sync {type=supply}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually trigger a network sync from the Cardano node.';

    public function __construct(
        private NetworkCoordinator $networkCoordinator
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
            case 'supply':
                (new SyncNetworkSupplyJob())->handle($this->networkCoordinator);
                break;
            default:
                $this->error('Specify the type of sync to perform: supply');
                return ConsoleCommand::FAILURE;
        }

        return ConsoleCommand::SUCCESS;
    }
}
