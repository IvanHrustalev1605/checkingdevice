<?php

namespace App\Models;

use App\Models\Filters\Objects\ObjectSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pribori;
use App\Models\Where;
use App\Models\ObjDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Objects extends Model
{
    use HasFactory;

    protected $primaryKey = 'ObjID';
    
    protected $fillable = ['ObjName', 
                           'comments',
                        'adress',
                        'contactPerson',
                        'phone',
                        'INN',
                        'KPP', 
                        'RSCH',
                        'KSCH',
                        'OKPO',
                        'OGRN'];

    public function Pribori(){
        return $this->hasMany(Pribori::class, 'PriborID');
    }
    public function Where(){
        return $this->hasOne(Where::class, 'WID');
    }
    public function Oder(){
        return $this->hasOne(Oders::class, 'odid');
    }
    public function ObjDoc(){
        return $this->hasMany(ObjDoc::class, 'ObjID');
    }
    public function GetFiles($value){
        $url = Storage::url($value);
         return $url;
    }
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
public function getBySearch(Request $request)
{
    $builder = (new ObjectSearch())->apply($request);
    return $builder;
}
}
