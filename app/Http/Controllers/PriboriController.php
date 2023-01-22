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

use function GuzzleHttp\Promise\all;

class PriboriController extends Controller
{
    public function Index(Request $request){
        $pribors = Pribori::all();
        $objects = Objects::all();
        return view('pribori.index', ['pribors' => $pribors, 'objects' => $objects, 'request' => $request]);
    }
    public function create(){
        $objects = Objects::all();
        $pribori = Pribori::all();
        $verifiers = Verifier::all();
        return view('pribori.create', ['objects' => $objects, 'pribori' =>$pribori, 'verifiers' => $verifiers]);
    }
    public function store(Request $request){
        Validator::make($request->all(),[
            'name' => 'required',
            'number'=>'required|',
            'ObjID' => 'required',
            'Vid' => 'required',
            'nextDate' => 'required|'
        ],
        [
            'name.required' => 'Заполните название!',
            'number.required' => 'Заполните номер!',
            'ObjID.required' => 'Выеберите чей прибор!',
            'Vid.required' => 'Укажите где он сейчас!',
            'nextDate.required' => 'Заполните Дату следующей поверки!',
        ])->validate();

        $device = Pribori::add($request->all());
        DB::table('wheres')->insert(
            ['PriborID' => $device->PriborID,
            'Vid' => $device->Vid]
          );
        return redirect()->route('PriboriIndex')->with('messageOK', 'Прибор добавлен!');
    }
    public function edit($Id){
        $objects = Objects::all();
        $pribor = Pribori::find($Id);
        $verifiers = Verifier::all();
        return view('pribori.edit', ['pribor' => $pribor, 'objects' => $objects, 'verifiers' => $verifiers]);
    }
    public function update(Request $request, $id){
        Validator::make($request->all(),[
            'name' => 'required',
            'number'=>'required|',
            'nextDate' => 'required',
            'ObjID' =>'required',
        ],
        [
            'name.required' => 'Заполните имя!',
            'number.required' => 'Заполните номер прибора!',
            'nextDate.required' => 'Укажите дату следующей поверки!',
            'ObjID.required' => 'Выьерите чей прибор',
        ])->validate();
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
