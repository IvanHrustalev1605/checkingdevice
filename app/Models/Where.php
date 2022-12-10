<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pribori;
use Illuminate\Support\Carbon;

class Where extends Model
{
    use HasFactory;

    protected $primaryKey = 'PriborID';
    
   protected $fillable = [

        'VID',
        'delivered',
        'takenAway'
    ];

    public function Pribor(){
        return $this->belongsTo(Pribori::class, 'PriborID');
    }
    public function Verifier(){
        return $this->belongsTo(Verifier::class, 'VID');
    }
    public function edit($fields){
        $this->fill($fields);
        //$this->ChangeDateFormat1($this->takenAway);
        //$this->ChangeDateFormat1($this->delivered);
        $this->save();
    }
    public function ChangeDateFormat1($value){
        $newDateFormat = Carbon::parse($value)->format('d-m-Y');
        return $newDateFormat;
    }


}
