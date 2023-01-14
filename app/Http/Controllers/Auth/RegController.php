<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Test\MailTest;
use App\Models\Organisation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegController extends Controller
{
    public function indexMail(){
        $organisations = Organisation::all();
        return view('mainAuth.register.indexMail', ['organisations' => $organisations]);
    }

    public function CheckEmail(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
        ],[
            'required' => 'Пожалууйста, заполните :attribute',
        ],
        [
            'email' => 'электронную почту'
        ]);  

        $emailRequest = $request->get('email');
        $organisations = Organisation::all();
        $userEmail = DB::table('users')->where('email', $emailRequest)->value('email');
        $isReg = DB::table('users')->where('email', $emailRequest)->value('is_reg');
        If($isReg == 1){
            return back()->with('statusTrue', 'Вы уже зарегистрированы! Если Вы забыли пароль, восстановите его!');
        }
        else{
            If($emailRequest === $userEmail){
                return view('mainAuth.register.index', ['organisations' => $organisations, 'request' => $request]);            
            }
            else return back()  
                        ->with('statusFalse', 'Такого email не существует!');
        }
    }

    public function add(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'orgid' => ['required']
        ],[
            'required' => 'Пожалууйста, заполните :attribute',
            'min' => 'Длина пароля не меньше :min!',
            'unique' => 'Эта электронная почта уже используется!'
        ],
        [
            'email' => 'электронную почту',
            'password' => 'пароль',
            'orgid' => 'название Вашей организации'  
        ]);     
        $thisEmail = $request->get('email');
        $id = DB::table('users')->where('email', $thisEmail)->value('uid');
        $User = User::find($id);
        $User->orgid = $request->get('orgid');
        $User->name = $request->get('name');
        $User->is_reg = 1;
        //поиск по ID регистрирующегося пользователя
        $order = User::find($User->uid);
        //отправка to эмэйл из формы сообщение из класса MailTest
        Mail::to($request->get('email'))->send(new MailTest($order));
        //хэш пароля для DB
        $User->GeneratePassword($request->get('password'));
        $User->save();
  
        return redirect()->route('index')->with('messageOK', 'Вы успешно прошли регистрацию. Письмо с именем пользователя и паролем отправлено на указанную почту!');
    }
}
