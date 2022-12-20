<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\Test\MailTest;
use App\Models\Organisation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class regcontroller extends Controller
{
    public function index(){
        $organisations = Organisation::all();
        return view('mainAuth.register.index', ['organisations' => $organisations]);
    }
    public function add(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'orgid' => ['required']
        ],[
            'required' => 'Пожалууйста, заполните :attribute',
            'min' => 'Длина пароля не меньше :min!'
        ],
        [
            'email' => 'электронную почту',
            'password' => 'пароль',
            'orgid' => 'название Вашей организации'  
        ]);

       
        $User = User::add($request->all());
        //поиск по ID регистрирующегося пользователя
        $order = User::find($User->uid);
        //отправка to эмэйл из формы сообщение из класса MailTest
        Mail::to($request->get('email'))->send(new MailTest($order));
        //хэш пароля для DB
        $User->GeneratePassword($request->get('password'));
        
  
        return redirect()->route('index')->with('messageOK', 'Вы успешно прошли регистрацию!');
    }
}
