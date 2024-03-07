<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('board:fetch-calendar-events')->everyMinute();
        $schedule->command('board:fetch-weather')->everyFifteenMinutes();
        $schedule->command('board:fetch-pressure')->everyFifteenMinutes();
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
