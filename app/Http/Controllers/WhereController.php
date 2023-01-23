<?php

namespace App\Http\Controllers;

use App\Models\Verifier;
use App\Models\Where;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhereController extends Controller
{
    public function Index($id){
        $w = Where::find($id);
        return view('where.index', ['w' => $w]);
    }
    public function edit($id){
        $device = Where::find($id);
        $verifiers = Verifier::all();
        return view('where.edit', ['w' => $device, 'verifiers' => $verifiers]);
    }
    public function update(Request $request, $id){
        $device = Where::find($id);
        $device->edit($request->all());
        DB::table('priboris')
              ->where('PriborID', $id)
              ->update(['Vid' => $request->get('Vid')]);
        return redirect()->route('WhereIndex', ['id' => $id])->with('message', 'Изменения приняты!');
    }

}
