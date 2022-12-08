<?php

namespace App\Http\Controllers;

use App\Models\Accounting;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function Index(){
        $accountings = Accounting::all();
        return view('Accounting.index', ['accountings' => $accountings]);
    }
}
