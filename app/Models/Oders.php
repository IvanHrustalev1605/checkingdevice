<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Oders extends Model
{
    use HasFactory;
    protected $primaryKey = 'odid';

    public function Object(){
        return $this->hasOne(Objects::class, 'ObjID');
    }
    protected $fillable = [ 
        'ObjID',
        'name',
        'where',
        'when',
        'paidfor',
        'whenPaid',
        'paidNumber',
        'delivery'
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
}
