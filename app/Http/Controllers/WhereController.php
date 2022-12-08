<?php

namespace App\Http\Controllers;

use App\Models\Where;
use Illuminate\Http\Request;

class WhereController extends Controller
{
    public function Index($id){
        $w = Where::find($id);
        return view('where.index', ['w' => $w]);
    }
    public function edit($id){
        $device = Where::find($id);
        return view('where.edit', ['w' => $device]);
    }
    public function update(Request $request, $id){
        $device = Where::find($id);
        $device->edit($request->all());
        return redirect()->route('PriboriIndex')->with('message', 'Изменения приняты!');
    }
}
