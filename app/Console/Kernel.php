<?php

namespace App\Console;

use App\Domain\Network\Application\Commands\TriggerNetworkSync;
use App\Domain\Network\Application\Jobs\SyncNetworkSupplyJob;
use App\Domain\Pools\Application\Commands\TriggerPoolSync;
use App\Domain\Pools\Application\Jobs\SyncPoolDetailsJob;
use App\Domain\Pools\Application\Jobs\SyncPoolMetaDataJob;
use App\Domain\Pools\Application\Jobs\SyncPoolsJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        TriggerPoolSync::class,
        TriggerNetworkSync::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        if (config('app.env') === 'local') {
            $schedule->command('telescope:prune')->daily();
            return;
        }

        $schedule->job(SyncNetworkSupplyJob::class)->dailyAt('00:10')->withoutOverlapping();

        $schedule->job(SyncPoolsJob::class)->fridays()->withoutOverlapping();
        $schedule->job(SyncPoolDetailsJob::class)->dailyAt('00:00')->withoutOverlapping();
        $schedule->job(SyncPoolMetaDataJob::class)
            ->twiceMonthly(1, 16, '00:30')
            ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
