<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AllUsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('allusers.index', ['users' => $users]);
    }
}
