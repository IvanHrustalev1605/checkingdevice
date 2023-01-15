<?php

namespace App\Models;

use App\Http\Controllers\OderFilterController;
use App\Models\Filters\Oders\OderSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;


class Oders extends Model
{
    use HasFactory;
    protected $primaryKey = 'odid';

    public function Object(){
        return $this->belongsTo(Objects::class, 'ObjID');
    }
    public function OderStatus(){
        return $this->belongsTo(OderStatus::class, 'osid');
    }
    public function Users(){
        return $this->belongsTo(User::class, 'uid');
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
        'osid',
        'uid', 
        'installed',
        'customerPaid'
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
public function delete(){
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
    If ($diff < 0 && $diff <= -7){
        return true;
    } 
}
public function togglePaid(){
    If ($this->paidfor == 1){
        return true;
    }
}
public function getBySearch(Request $request)
{
    $builder = (new OderSearch())->apply($request);
    return $builder;
}
}