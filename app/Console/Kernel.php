<?php

namespace App\Console;



use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;


class Kernell extends Kernel
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
        
        $schedule->command('orders:crone')->everyMinute();
         $schedule->command('device:crone')->everyMinute();
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
