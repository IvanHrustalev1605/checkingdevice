<?php

namespace App\Http\Controllers;

use App\Models\Verifier;
use Illuminate\Http\Request;

class VerifierController extends Controller
{
    public function index(){
        $verifiers = Verifier::all();
        return view('verifier.index', ['verifiers' => $verifiers]);
    }
}
