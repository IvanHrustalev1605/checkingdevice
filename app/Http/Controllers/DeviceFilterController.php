<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objects;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Pribori;

class DeviceFilterController extends Controller
{
    public function sort(Request $request, Pribori $devices){
            $objects = Objects::all();
            $device = $devices->getBySearch($request)->get();
            return view('pribori.index', ['pribors' => $device, 'objects'=>$objects]);

    }
    
    public function ChangeDateFormat($value){
        $newDateFormat = Carbon::parse($value)->format('Y-m-d');
        return $newDateFormat;
            }
        }