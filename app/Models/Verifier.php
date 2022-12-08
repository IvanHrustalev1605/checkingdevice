<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Where;
use App\Models\Pribori;

class Verifier extends Model
{
    use HasFactory;

    protected $primaryKey = 'VID';

    public function Device(){
        return $this->hasMany(Pribori::class, 'PriborID');
    }
    public function Where(){
        return $this->hasMany(Where::class, 'WID');
    }
}
