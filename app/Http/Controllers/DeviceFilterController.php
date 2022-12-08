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
    /*public function sortByPeriod(Request $request){
        $objects = Objects::all();

        If ($request->get('SortDateUp') == null) {$SortDateUp = '2000-12-31';}
        else{$SortDateUp = $this->ChangeDateFormat($request->get('SortDateUp'));}
        
        If ($request->get('SortDateTo') == null) {$SortDateTo = '2050-12-31';}
        else{$SortDateTo = $this->ChangeDateFormat($request->get('SortDateTo'));}
        $pribors = DB::table('priboris')->whereBetween('nextDate', [$SortDateUp, $SortDateTo])
                                        ->get();                                
        return view('pribori.index', ['pribors' => $pribors, 'objects'=>$objects]);
    }*/
    
    public function ChangeDateFormat($value){
        $newDateFormat = Carbon::parse($value)->format('Y-m-d');
        return $newDateFormat;
            }
        }