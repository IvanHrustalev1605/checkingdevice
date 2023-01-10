<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class MainAuthController extends Controller
{
    public function index(){
        return view('mainAuth.login.index');
    }

    public function login(Request $request){
       Hash::make('password');
       $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('main');
        }

        return back()->withErrors([
            'email' => 'Сочетание email и пароля не найдено!',
        ]);
    }
    
    public function logout() {
        Auth::logout();
        return redirect()
            ->intended('/')
            ->with('success', 'Вы вышли из личного кабинета');
    }
}

