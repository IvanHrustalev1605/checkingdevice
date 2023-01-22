<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\Test\MailCron;
use App\Models\Pribori;
use Carbon\Carbon;
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
        $now = Carbon::now('Europe/Moscow');
        $arrObjName = [];
        $arrNumber = [];
        $arrNames = [];
        $devices = Pribori::all();
        foreach($devices as $device){
            If(($now->diffInMonths($device->nextDate)) < 1 && ($device->Vid == 5)){
           array_push($arrObjName,$device->Objects->ObjName );
           array_push($arrNumber,$device->number );
           array_push($arrNames,$device->name );
        }
        }
        
        foreach($arrObjName as $key => $ObjName){
            $result[] = [$ObjName => [$arrNumber[$key] => $arrNames[$key]]] ;
        }
        If(isset($result)){
        Mail::to('ergogaz@gmail.com')->send(new MailCron( $result));
              return Log::info(1);
         }
}
}
