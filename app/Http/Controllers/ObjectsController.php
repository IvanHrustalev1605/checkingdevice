<?php

namespace App\Http\Controllers;

use App\Models\Objects;
use Illuminate\Http\Request;

class ObjectsController extends Controller
{
    public function Index(){
        $objects = Objects::all();
        return view('objects.index', ['objects' => $objects]);
    }
    public function create(){
        return view('objects.create');
    }
    public function store(Request $request){
        objects::create($request->all());
        return redirect()->route('ObjectsIndex');
    }
    public function edit(){
        $objects = Objects::all();
        return view('objects.edit', ['objects' => $objects]);
    }
    public function update(Request $request, $id){
        $objects = Objects::find($id);
        $objects->edit($request->all());
        return redirect()->route('ObjectsIndex');
    }
    public function delete($id){
        $objects = Objects::find($id);
        $objects->delete();
        return redirect()->route('ObjectsIndex');
    }
}
