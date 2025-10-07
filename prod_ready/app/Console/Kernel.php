<?php

namespace App\Console;

use App\Console\Commands\ClearContent;
use App\Console\Commands\CleanupPostFooters;
use App\Console\Commands\SyncExternalContent;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array<int, class-string>
     */
    protected $commands = [
        SyncExternalContent::class,
        ClearContent::class,
        CleanupPostFooters::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('external:sync')->hourly();
    }
}
