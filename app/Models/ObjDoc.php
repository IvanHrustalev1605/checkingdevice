<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjDoc extends Model
{
    use HasFactory;

    protected $primaryKey = 'ODid';

    protected $fillable = ['ObjID', 'doc' ];
    
    public static function add($fields){
        $od = new static;
        $od->fill($fields);
        $od->save(); 
        return $od;
}
public function edit($fields){
        $this->fill($fields);
        $this->save();
}
public function remove(){
    $this->delete();
}

}
