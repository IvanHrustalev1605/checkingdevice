<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objects;
use App\Models\Oders;
use Illuminate\Support\Carbon;
use App\Models\Pribori;

class OderFilterController extends Controller
{
    public function sort(Request $request, Oders $oders){
        $objects = Objects::all();
            $oders = $oders->getBySearch($request)->get();
            return view('oders.index', ['oders' => $oders, 'objects' => $objects]);

    }
    
    public function ChangeDateFormat($value){
        $newDateFormat = Carbon::parse($value)->format('Y-m-d');
        return $newDateFormat;
            }
        }