<?php

namespace App\Console\Commands;

use App\Mail\Test\MailCron;
use App\Models\Pribori;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'text:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some test every minute';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $now = Carbon::now();

        $date =  DB::table('priboris')->where('currentDate','>=', "$now")->pluck('currentDate');
        $number = DB::table('priboris')->where('currentDate','>=', "$now")->pluck('number');
        $oder = User::find(6);
        Mail::to($oder->email)->send(new MailCron( $date, $number));
        return Log::info(1);
}
}
