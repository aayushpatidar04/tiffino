<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function dashboard()
    {
        if(Session()->has('loginsuccess') && Session::get('loginsuccess')=='Logged In Successfully')
        {
            return view('index');
        }
        else
        {
            return redirect()->route('login')->with('loginerror','Please Login First');
        }
    }
}
