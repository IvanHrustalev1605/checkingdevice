<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\Test\MailCron;
use App\Models\Pribori;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DeviceCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'device:crone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
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
        $devices = Pribori::all();
        foreach($devices as $device){
            If(($now->diffInMonths($device->nextDate)) > 1){
            $arr[] = $device->Objects->ObjName;
           $arrValue[] = $device->number;
           $arrKeyValue = array_combine($arr, $arrValue);
        }
        }
        $oder = User::find(6);

        //Mail::to($oder->email)->send(new MailCron( $arrKeyValue));
        If(isset($arrKeyValue)){
        return Log::info( $arrKeyValue);
    }
    else return Log::info( 0);
    }
}
