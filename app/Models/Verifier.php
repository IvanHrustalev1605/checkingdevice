<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Where;
use App\Models\Pribori;

class Verifier extends Model
{
    use HasFactory;

    protected $primaryKey = 'Vid';

    public function Device(){
        return $this->hasMany(Pribori::class, 'PriborID');
    }

    protected $fillable = ['name',
                            'adress',     
                             'phone',
                            'email'];

    public static function add($fields){
        $org = new static;
        $org->fill($fields);
        $org->save(); 
        return $org;
    }
    public function edit($fields){
        $this->fill($fields);
        $this->save();
}
}
