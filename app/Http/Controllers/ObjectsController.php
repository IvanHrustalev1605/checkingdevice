<?php

namespace App\Http\Controllers;

use App\Models\ObjDoc;
use App\Models\Objects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObjectsController extends Controller
{
    public function Index(){
        $objects = Objects::all();
        return view('objects.index', ['objects' => $objects]);
    }
    public function thisObject($id){
        $object = Objects::find($id);
        $documents = $object->ObjDoc;
        return view('objects.thisObject', ['object' => $object, 'documents' => $documents]);
    }
    public function documents(Request $request, $id){
        $validatedData = $request->validate([
            'document' => 'required',
            'document.*' => 'mimes:jpg,bmp,png, jpeg'
            ],
            [
                'document.required' => 'Добавьте изображение!',
                'document.mimes' => 'Разрешенные форматы:jpg,bmp,png'
            ]);

            $objDoc = new ObjDoc;
            $path = $request->file('document')->store('documents','public');
            $objDoc->doc = $path;
            $objDoc->ObjID = $id;
            $objDoc->save(); 
            
            return redirect()->route('thisObject',['id' => $id]);
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
