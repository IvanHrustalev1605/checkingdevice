<?php

namespace App\Console\Commands;

use App\Mail\Test\MailCron;
use App\Mail\Test\OdersMailCron;
use App\Models\Oders;
use App\Models\User;
use Carbon\Carbon;
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
        $oder = User::find(6);
        
       $a =  Oders::all();
        foreach($a as $b){
            If($b->paidfor == 0){
           $arr[] = $b->Object->ObjName;
           $arrValue[] = $b->name;
           $arrKeyValue = array_combine($arr, $arrValue);
        }
        }
        Mail::to($oder->email)->send(new OdersMailCron($arrKeyValue));
        return Log::info($arrKeyValue);
}
}
