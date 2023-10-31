<?php

namespace App\Console;

use App\Models\Form;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            Form::where('effective_date', '<=', now())->update(['status' => 3]);
        })->everyMinute(); // Esto ejecutará la tarea cada minuto
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
