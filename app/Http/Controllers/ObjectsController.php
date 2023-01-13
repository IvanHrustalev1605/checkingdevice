<?php

namespace App\Http\Controllers;

use App\Models\ObjDoc;
use App\Models\Objects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $objDocs = DB::table('obj_docs')
                ->where('ObjId', 'LIKE', $id)
                ->get();
        return view('objects.thisObject', ['object' => $object, 'documents' => $documents, 'objDocs' => $objDocs]);
    }
    public function editObject($id){
        $object = Objects::find($id);
        return view('objects.thisObject_edit', ['object' => $object]);
    }
    public function updateObject(Request $request, $id){
        $object = Objects::find($id);
        $object->edit($request->all());
        return redirect()->route('thisObject',['id' => $id]);
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

            $file = request()->file('document');
            $name = $file->getClientOriginalName();
            $objDoc = new ObjDoc;
            $path = $request->file('document')->store('documents','public');
            $objDoc->doc = $path;
            $objDoc->ObjID = $id;
            $objDoc->docName = $name;
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
