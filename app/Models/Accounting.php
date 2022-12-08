<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Objects;

class Accounting extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
          'bill',
          'sum',
          'pay',
          'UPD',
          'date of issue',
          'comments'
    ];

    public function Objects(){
        return $this->HasOne(Objects::class, 'ObjID');
    }
    public function GetObjectName(){
        if($this->Objects !== null){
            return $this->Objects->name;
        }
        else return null;
    }
}
