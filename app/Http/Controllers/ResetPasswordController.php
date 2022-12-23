<?php

namespace App\Http\Controllers;

use App\Mail\Mail\ResetPasswordMail;
use App\Mail\Test\MailTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
public function create(Request $request){
    return view('mainAuth.reset.index', ['request' => $request]);
}

   public function reset(Request $request){

    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8'
    ]);

        $status = Password::reset(
        $request->only('email', 'password', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => $password
            ])->setRememberToken(Str::random(60));
            Mail::to($user->email)->send(new MailTest($user));
            $user->GeneratePassword($password);
            $user->save();
            
              
        }
    );
 
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('index')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
}
}
