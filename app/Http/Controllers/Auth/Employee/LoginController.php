<?php

namespace App\Http\Controllers\Auth\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee\Employee;

class LoginController extends Controller

{

    protected $guardName = 'employees';
    protected $loginRoute;

    public function indexEmployee(){
        return view('employee.login.index');
    }

    public function loginEmployee(Request $request){
      Hash::make('password');

        $credentials = $request->validate([
             'email' => ['required', 'email'],
             'password' => ['required'],
         ]);

         if (Auth::guard($this->guardName)->attempt($credentials)) {
             $request->session()->regenerate();

             return redirect()->intended('main');
         }
 
         return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
         ]);
     }
     public function logout() {
         Auth::logout();
         return redirect()
             ->intended('/')
             ->with('success', 'Вы вышли из личного кабинета');
     }

}
