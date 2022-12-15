<?php

namespace App\Http\Controllers\Auth\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee\Employee;
use Illuminate\Http\Request;

class RegController extends Controller
{
    public function indexEmployee(){
        return view('employee.registr.index');
    }
    public function add(Request $request){
        /*$request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'name' => ['required']
        ],[
            'required' => 'Пожалууйста, заполните :attribute',
            'min' => 'Длина пароля не меньше :min!'
        ],
        [
            'email' => 'электронную почту',
            'password' => 'пароль',
            'name' => 'название Вашей организации'  
        ]);*/

       
        $Employee = Employee::add($request->all());
        //поиск по ID регистрирующегося пользователя
        /*$order = User::find($User->uid);
        //отправка to эмэйл из формы сообщение из класса MailTest
        Mail::to($request->get('email'))->send(new MailTest($order));
        //хэш пароля для DB*/
        $Employee->GeneratePassword($request->get('password'));
        
  
        return redirect()->route('EmloyeeLogin')->with('messageOK', 'Вы успешно прошли регистрацию!');
}
}

