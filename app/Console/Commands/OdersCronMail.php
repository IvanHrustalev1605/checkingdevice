<?php

namespace App\Console\Commands;

use App\Mail\Test\OdersMailCron;
use App\Models\Oders;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OdersCronMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:crone';

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
       $oders =  Oders::all();
       $arrObjName = [];
       $arrOderName = [];
       foreach($oders as $oder){
           If($oder->paidfor == 0){
          array_push($arrObjName,$oder->Object->ObjName );
          array_push($arrOderName,$oder->name );
       }
       }

       foreach($arrObjName as $key => $ObjName){

           $result[] = [$ObjName => $arrOderName[$key]] ;
       }
       If(isset($result)){
        Mail::to('khrustalev16@gmail.com')->send(new OdersMailCron( $result));
             return Log::info(1);
        }
        else return Log::info(0);

}
}
