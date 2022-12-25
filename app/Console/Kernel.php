<?php

namespace App\Console;

use App\Console\Commands\DevicesCron;
use App\Console\Commands\OdersCronMail;
use App\Mail\Test\MailTest;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    protected $command =[
        TestCron::class
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
         $schedule->command('orders:crone')->dailyAt('9:00');;
         $schedule->command('device:crone')->dailyAt('9:00');;
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
