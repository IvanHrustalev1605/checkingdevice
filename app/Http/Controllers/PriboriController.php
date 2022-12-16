<?php

namespace App\Http\Controllers;

use App\Models\Objects;
use App\Models\Pribori;
use App\Models\StatusDevice;
use App\Models\Verifier;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class PriboriController extends Controller
{
    public function Index(){
        $pribors = Pribori::all();
        $objects = Objects::all();
        return view('pribori.index', ['pribors' => $pribors, 'objects' => $objects]);
    }
    public function create(){
        $objects = Objects::all();
        $pribori = Pribori::all();
        $verifiers = Verifier::all();
        $statusDevises = StatusDevice::all();
        return view('pribori.create', ['objects' => $objects, 'pribori' =>$pribori, 'verifiers' => $verifiers, 'statusDevises' => $statusDevises]);
    }
    public function store(Request $request){
        Validator::make($request->all(),[
            'name' => 'required',
            'number'=>'required|',
            'ObjID' => 'required',
            'VID' => 'required',
            'currentDate' =>'required|',
            'nextDate' => 'required|'
        ],
        [
            'name.required' => 'Заполните название!',
            'number.required' => 'Заполните номер!',
            'ObjID.required' => 'Выеберите чей прибор!',
            'VID.required' => 'Укажите где он сейчас!',
            'currentDate.required' => 'Заполните Дату текущей поверки!',
            'nextDate.required' => 'Заполните Дату следующей поверки!',
        ])->validate();

        $device = Pribori::add($request->all());
        DB::table('wheres')->insert(
            ['PriborID' => $device->PriborID]
          );
        return redirect()->route('PriboriIndex')->with('messageOK', 'Прибор добавлен!');
    }
    public function edit($Id){
        $objects = Objects::all();
        $pribor = Pribori::find($Id);
        return view('pribori.edit', ['pribor' => $pribor, 'objects' => $objects]);
    }
    public function update(Request $request, $id){
        $pribor = Pribori::find($id);
        $pribor->edit($request->all());
        return redirect()->route('PriboriIndex');
    }
    public function delete($id){
        $pribor = Pribori::find($id);
        $pribor->delete();
        return redirect()->route('PriboriIndex');
    }
   
    
    
}
