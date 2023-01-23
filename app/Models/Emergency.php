<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Emergency extends Model
{
    use HasFactory;

    protected $primaryKey = 'eid';
  
    public function GetObjects(){
        return $this->hasOne(Objects::class, 'ObjID');
    }
    public function GetUser(){
        return $this->belongsTo(User::class, 'uid');
    }
    protected $fillable = ['date',
                           'time_call',
                           'time_departure',
                           'time_end',
                             'ObjID',
                            'uid'];


 public static function add($fields){
            $pribor = new static;
            $pribor->fill($fields);
            $pribor->save(); 
            return $pribor;
    }
    public function edit($fields){
            $this->fill($fields);
            $this->save();
    }
    public function remove(){
        $this->delete();
    }
    public function DiffTime($time_depature, $time_end){
        $a = Carbon::parse($time_depature);
        $b = Carbon::parse($time_end);
        $totalDuration = $b->diffInHours($a);
        return $totalDuration;
    }
    public function SumPay($diff){
        return 500 * $diff;
    }
    public function FinalSum($id){
        $price = DB::table('emergencies')
        ->where('uid', 'LIKE', "$id")
        ->sum('sum');
        return  $price;
    }
}
