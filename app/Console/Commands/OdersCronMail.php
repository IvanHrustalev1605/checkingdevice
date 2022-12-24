<?php

namespace App\Console\Commands;

use App\Mail\Test\MailCron;
use App\Mail\Test\OdersMailCron;
use App\Models\Oders;
use App\Models\Pribori;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OdersCronMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'text:oderCrone';

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
        $oders = json_decode(Oders::where('paidfor', 0)->get()) ;
        foreach($oders as $o){
            $arrKey[] = $o->ObjID;
            $arrValue[] = $o->name;
            $arrKeyValue = array_combine($arrKey, $arrValue);
        }
        //если нужно из массива в строку
        //$arrToStr = implode(", ", $arrKeyValue);
        $oder = User::find(6);
        Mail::to($oder->email)->send(new OdersMailCron($arrKeyValue));
        return Log::info(1);
}
}
