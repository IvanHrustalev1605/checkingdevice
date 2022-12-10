<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pribori;
class StatusDevice extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function Pribori(){
        return $this->hasMany(Pribori::class, 'PriborID');
    }
}
