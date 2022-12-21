<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Oders extends Model
{
    use HasFactory;
    protected $primaryKey = 'odid';

    public function Object(){
        return $this->hasOne(Objects::class, 'ObjID');
    }
    public function OderStatus(){
        return $this->hasOne(OderStatus::class, 'osid');
    }
    protected $fillable = [ 
        'ObjID',
        'name',
        'where',
        'when',
        'paidfor',
        'whenPaid',
        'paidNumber',
        'delivery',
        'osid'
    ];
    public static function add($fields){
        $user = new static;
        $user->fill($fields);
        $user->save(); 
        return $user;
}
public function edit($fields){
        $this->fill($fields);
        $this->save();
}
public function remove(){
    $this->delete();
}
public function ChangeDateFormat1($value){
    $newDateFormat = Carbon::parse($value)->format('d/m/Y');
    return $newDateFormat;
}
public function DiffDate($value){
    $date = Carbon::now();
    $a = Carbon::create($value);
    $diff = $date->diffInDays($a, false);
    If ($diff <= 7){
        return true;
    } 
}
public function togglePaid(){
    If ($this->paidfor == 1){
        return true;
    }
}
}