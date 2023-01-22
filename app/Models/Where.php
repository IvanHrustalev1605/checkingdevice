<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pribori;
use Illuminate\Support\Carbon;
use App\Models\Verifier;

class Where extends Model
{
    use HasFactory;

    protected $primaryKey = 'PriborID';
    
   protected $fillable = [
        'Vid',
        'delivered',
        'takenAway',
        'status'
    ];

    public function Pribor(){
        return $this->hasOne(Pribori::class, 'PriborID');
    }
    public function Verifier(){
        return $this->belongsTo(Verifier::class, 'Vid');
    }
    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }
    public function ChangeDateFormat1($value){
        $newDateFormat = Carbon::parse($value)->format('d-m-Y');
        return $newDateFormat;
    }


}
