<?php

namespace App\Http\Controllers;

use App\Models\Verifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VerifierController extends Controller
{
    public function index(){
        $verifiers = Verifier::all();
        return view('verifier.index', ['verifiers' => $verifiers]);
    }
    public function createForm(){
        return view('verifier.create');
    }
    public function create(Request $request){
        Validator::make($request->all(),
        [
            'name' => 'required',
        ],
        [
            'name.required' => 'Заполните название!',
            
        ])->validate();
        Verifier::add($request->all());
        return redirect()->route('VerifierIndex');
    }
}
