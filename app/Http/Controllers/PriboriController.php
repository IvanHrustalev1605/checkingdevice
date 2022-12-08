<?php

namespace App\Http\Controllers;

use App\Models\Objects;
use App\Models\Pribori;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
        return view('pribori.create', ['objects' => $objects, 'pribori' =>$pribori]);
    }
    public function store(Request $request){
        $device = Pribori::add($request->all());
        $device->GetObjectId($request->get('object'));
        return redirect()->route('PriboriIndex');
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
