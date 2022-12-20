<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;
    protected $hidden = [
        'remember_token',
    ];

    protected $primaryKey = 'orgid';

    public function Users(){
        return $this->hasOne(User::class, 'uid');
    }
    protected $fillable = ['name',
                            'adress',
                            'INN',
                            'KPP',
                            'RSCH',
                            'KSCH',
                            'OKPO',
                        'OGRN',
                    'phone'];

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
