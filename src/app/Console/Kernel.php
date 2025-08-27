<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Comandos Artisan do aplicativo.
     *
     * @var array<int, class-string|string>
     */
    protected $commands = [
        \App\Console\Commands\ImportApiAlpes::class,
    ];

    /**
     * Define o agendamento dos comandos.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Rodar a importação a cada hora
        $schedule->command('import:alpes')->everyMinute();
    }

    /**
     * Registra os comandos Artisan.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
