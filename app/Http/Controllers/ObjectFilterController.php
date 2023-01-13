<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objects;
use Illuminate\Support\Carbon;


class ObjectFilterController extends Controller
{
    public function sort(Request $request, Objects $objects){
        $objects = $objects->getBySearch($request)->get();
        return view('objects.index', ['objects' => $objects]);

    }
    
        }