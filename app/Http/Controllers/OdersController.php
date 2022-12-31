<?php

namespace App\Http\Controllers;

use App\Models\Objects;
use App\Models\Oders;
use App\Models\OderStatus;
use Illuminate\Http\Request;

class OdersController extends Controller
{
    public function index(){
        $oders = Oders::all();
        $objects = Objects::all();
        return view('oders.index', ['oders' => $oders, 'objects' => $objects]);
    }
    public function lessIndex(){
        $oders = Oders::all();
        $objects = Objects::all();
        return view('oders.lessindex', ['oders' => $oders, 'objects' => $objects]);
    }
    public function create(){
        $objects = Objects::all();
        $oderstatus = OderStatus::all();
        return view('oders.create', ['objects' => $objects, 'oderstatus' => $oderstatus]);
    }
    public function store(Request $request){
        Oders::add($request->all());
        return redirect()->route('OderIndex');
    }
    public function edit($Id){
        $objects = Objects::all();
        $oder = Oders::find($Id);
        $oderstatus = OderStatus::all();
        return view('oders.edit', ['objects' => $objects, 'oder' => $oder, 'oderstatus' => $oderstatus]);
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
    public function updateStatus(Request $request)
    {
        $oder = Oders::find($request->odid); 
        $oder->paidfor = $request->paidfor; 
        $oder->save(); 
        return response()->json(['success'=>'Status change successfully.']); 
    }
}

