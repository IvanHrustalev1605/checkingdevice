<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\Test\MailDeviceWhereCommentsNotNull;
use App\Models\Pribori;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DeviceCommentsNotNull extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeviceCommentsNotNull:crone';

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
        $arrObjName = [];
        $arrNumber = [];
        $arrNames = [];
        $arrComments = [];
        $arrPriborID = [];
        $devices = Pribori::all();
        foreach($devices as $device){
            If($device ->comments !== null){
           array_push($arrObjName,$device->Objects->ObjName );
           array_push($arrNumber,$device->number );
           array_push($arrNames,$device->name );
           array_push($arrComments,$device->comments );
           array_push($arrPriborID,$device->PriborID );
        }
        }
        
        foreach($arrObjName as $key => $ObjName){
            $result[] = [$ObjName => [$arrComments[$key] => [$arrNumber[$key] => $arrNames[$key]]]
                                    
                        ];
        }
        If(isset($result)){
        Mail::to('ergogaz@gmail.com')->send(new MailDeviceWhereCommentsNotNull( $result));
              return Log::info(1);
         }
}
}
