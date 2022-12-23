<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function index(Request $request){
        return view('mainAuth.forgot.index', ['request' => $request]);
    }
    public function store(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('index')->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);           
    }

    
}
