<?php

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Console\Scheduling\Schedule;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Ajoutez vos commandes ici
    ];

    protected function schedule(Schedule $schedule)
    {
        // Planifiez vos commandes ici
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
