<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * 你的應用程式提供的 Artisan 指令。
     *
     * @var array
     */

    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * 定義應用程式的指令排程。
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('inspire')
                 -> dailyAt('20:00');
    }
}
