<?php

namespace App\Http\Controllers;

use App\Models\Objects;
use App\Models\Oders;
use App\Models\OderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OdersController extends Controller
{
    public function index(){
        $oders = Oders::all();
        $objects = Objects::all();
        return view('oders.index', ['oders' => $oders, 'objects' => $objects]);
    }
    public function create(){
        $objects = Objects::all();
        $oderstatus = OderStatus::all();
        return view('oders.create', ['objects' => $objects, 'oderstatus' => $oderstatus]);
    }
    public function store(Request $request){
        Validator::make($request->all(),[
            'ObjID' => 'required',
            'name'=>'required|',
            'where' => 'required',
            'when' => 'required',
            'whenPaid' =>'required',
            'paidNumber' =>'required',
            'delivery' =>'required',
            'osid' =>'required',
            'customerPaid' =>'required',
        ],
        [
            'name.required' => 'Заполните название',
            'ObjID.required' => 'Выберите чей заказ',
            'where.required' => 'Укажите где заказано',
            'when.required' => 'Укажите дату заказа',
            'osid.required' => 'Выберите статус заказа',
            'delivery.required' => 'Укажите примерную дату поставки',
        ])->validate();
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
        Validator::make($request->all(),[
            'ObjID' => 'required',
            'name'=>'required|',
            'where' => 'required',
            'when' => 'required',
            'whenPaid' =>'required',
            'paidNumber' =>'required',
            'delivery' =>'required',
            'osid' =>'required',
            'customerPaid' =>'required',
        ],
        [
            'name.required' => 'Заполните название',
            'ObjID.required' => 'Выберите чей заказ',
            'where.required' => 'Укажите где заказано',
            'when.required' => 'Укажите дату заказа',
            'osid.required' => 'Выберите статус заказа',
            'delivery.required' => 'Укажите примерную дату поставки',
        ])->validate();
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

