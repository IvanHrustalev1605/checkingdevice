<?php

namespace App\Models;

use App\Models\Filters\Device\DeviceObjectSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Objects;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Where;
use App\Models\Verifier;

class Pribori extends Model
{
    use HasFactory;

    protected $primaryKey = 'PriborID';
  
    
    protected $fillable = ['name',
                           'number',
                           'nextDate',
                           'comments',
                             'Vid',
                            'ObjID',
                            'uid'];

    public function Objects(){
        return $this->belongsTo(Objects::class, 'ObjID');
    }
    public function Where(){
        return $this->belongsTo(Where::class, 'PriborID');
    }
    public function Verifier(){
        return $this->belongsTo(Verifier::class, 'Vid');
    }
    public function Users(){
        return $this->belongsTo(User::class, 'uid');
    }
    public static function add($fields){
            $pribor = new static;
            $pribor->fill($fields);
            $pribor->ChangeDateFormat1($pribor->currentDate);
            $pribor->ChangeDateFormat1($pribor->nextDate);
            $pribor->save(); 
            return $pribor;
    }
    public function edit($fields){
            $this->fill($fields);
            $this->ChangeDateFormat1($this->currentDate);
            $this->ChangeDateFormat1($this->nextDate);
            $this->save();
    }
    public function remove(){
        $this->delete();
    }
    public function GetObjectId($id){
              $this->ObjID = $id;
              return $this->save();
    }
    public function GetWhereId($id){
        $this->WID = $id;
        return $this->save();
}
    
    public function ChangeDateFormat1($value){
        $newDateFormat = Carbon::parse($value)->format('d-m-Y');
        return $newDateFormat;
    }

    public function getBySearch(Request $request)
    {
        $builder = (new DeviceObjectSearch())->apply($request);
        return $builder;
    }
}
