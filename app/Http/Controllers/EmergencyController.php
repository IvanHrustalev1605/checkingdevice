<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use App\Models\Objects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmergencyController extends Controller
{
    public function create(){
        $objects = Objects::all();
        return view('emergency.create', ['objects' => $objects]);
    }
    public function store(Request $request){
        Validator::make($request->all(),[
            'date' => 'required',
            'time_call'=>'required|',
            'time_departure' => 'required',
            'time_end' => 'required',
            'ObjID' =>'required',
        ],
        [
            'date.required' => 'Заполните дату',
            'time_call.required' => 'Укажите время вызова',
            'time_departure.required' => 'Укажите время прибытия на объект',
            'time_end.required' => 'Укажите время окончания работ',
            'ObjID.required' => 'Укажите объект',
        ])->validate();
       $emergencys =  Emergency::add($request->all());
       $sum =$emergencys->SumPay($emergencys->DiffTime($emergencys-> time_departure,$emergencys->time_end));
       $emergencys-> sum = $sum;
       $emergencys->save();
        return redirect()->route('userIndex', Auth::user()->uid);
    }
    public function edit($id){
        $emergency = Emergency::find($id);
        $objects = Objects::all();
        return view('emergency.edit', ['emergency' => $emergency, 'objects' => $objects]);
    }
    public function update(Request $request, $id){
        Validator::make($request->all(),[
            'date' => 'required',
            'time_call'=>'required|',
            'time_departure' => 'required',
            'time_end' => 'required',
            'ObjID' =>'required',
        ],
        [
            'date.required' => 'Заполните дату',
            'time_call.required' => 'Укажите время вызова',
            'time_departure.required' => 'Укажите время прибытия на объект',
            'time_end.required' => 'Укажите время окончания работ',
            'ObjID.required' => 'Укажите объект',
        ])->validate();
        $emergency = Emergency::find($id);  
        $emergency->edit($request->all());
        $sum =$emergency->SumPay($emergency->DiffTime($emergency-> time_departure,$emergency->time_end));
        $emergency-> sum = $sum;
        $emergency->time_end = $request->get('time_end');
        $emergency->save();
        return redirect()->route('userIndex', Auth::user()->uid);
}

}