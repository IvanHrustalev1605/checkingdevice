<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        $user = User::find($id);
        $user->edit($request->all());
        
        /*if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            // Upload Image$path = $request->file(‘image’)->storeAs(‘public/image’, $fileNameToStore);
            }
            
            // Else add a dummy image
            else {
            $fileNameToStore = 'noimage.jpg';
            }*/
            $path = $request->file('avatar')->store('uploads', 'public');
            $user->avatar = $path;
            $user->save();
        return redirect()->route('userIndex', $id);
    }
}
