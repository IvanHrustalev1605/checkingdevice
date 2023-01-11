<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index($id){
        $user = User::find($id);
        return view('users.index', ['user' => $user]);
    }
    public function edit($id){
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }
    public function update(Request $request, $id){
        Validator::make($request->all(),[
            'name' => 'required',
            'surname'=>'required|',
            'post' => 'required',
            'mobile' => 'required',
            'email' =>'required|email',
            'avatar' => 'required|image'
        ],
        [
            'name.required' => 'Заполните имя!',
            'surname.required' => 'Заполните фамилию!',
            'post.required' => 'Укажите должность!',
            'mobile.required' => 'Укажите номер телефона!',
            'email.required' => 'Заполните email',
            'avatar.image' => 'Файл должен быть в формате фотографии!'
        ])->validate();
        $user = User::find($id);
        $user->edit($request->all());
        
            $path = $request->file('avatar')->store('public/uploads', 'public');
            $user->avatar = $path;
            $user->save();
        return redirect()->route('userIndex', $id);
    }
}
