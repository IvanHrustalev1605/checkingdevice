<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pribori;
use App\Models\Where;

class Objects extends Model
{
    use HasFactory;

    protected $primaryKey = 'ObjID';
    
    protected $fillable = ['ObjName', 'comments' ];

    public function Pribori(){
        return $this->hasMany(Pribori::class, 'PriborID');
    }
    public function Where(){
        return $this->hasOne(Where::class, 'WID');
    }
    
}
