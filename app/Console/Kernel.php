<?php

namespace App\Console;

use App\Console\Commands\GenerateSitemap;
use App\Console\Commands\SendDailyForecast;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SendDailyForecast::class,
        GenerateSitemap::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:email:daily-forecast')->dailyAt('8:00');
    }

    protected function commands(): void
    {
        // $this->load(__DIR__.'/Commands');

        // require base_path('routes/console.php');
    }
}
