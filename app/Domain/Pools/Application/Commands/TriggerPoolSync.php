<?php

namespace App\Domain\Pools\Application\Commands;

use App\Domain\Pools\Application\Jobs\SyncPoolsJob;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as ConsoleCommand;

class TriggerPoolSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pools:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trigger the pool sync from the Cardano node.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $job = new SyncPoolsJob();

        dispatch($job);

        return ConsoleCommand::SUCCESS;
    }
}
