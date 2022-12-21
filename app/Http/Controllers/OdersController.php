<?php

namespace App\Http\Controllers;

use App\Models\Objects;
use App\Models\Oders;
use Illuminate\Http\Request;

class OdersController extends Controller
{
    public function index(){
        $oders = Oders::all();
        return view('oders.index', ['oders' => $oders]);
    }
    public function create(){
        $objects = Objects::all();
        return view('oders.create', ['objects' => $objects]);
    }
    public function store(Request $request){
        Oders::add($request->all());
        return redirect()->route('OderIndex');
    }
    public function edit($Id){
        $objects = Objects::all();
        $oder = Oders::find($Id);
        return view('oders.edit', ['objects' => $objects, 'oder' => $oder]);
    }
    public function update(Request $request, $id){
        $oder = Oders::find($id);
        $oder->edit($request->all());
        return redirect()->route('OderIndex');
    }
    public function delete($id){
        $oder = Oders::find($id);
        $oder->delete();
        return redirect()->route('OderIndex');
    }
}
