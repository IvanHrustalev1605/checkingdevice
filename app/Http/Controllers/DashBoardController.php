<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function Index(){
        return view('dashboard');
    }
    public function edit($Id){
        $org = Organisation::find($Id);
        return view('organisations.edit', ['org' => $org]);
    }
    public function update(Request $request, $id){
        $org = Organisation::find($id);
        $org->edit($request->all());
        return redirect()->route('dashboard');
    }
}
