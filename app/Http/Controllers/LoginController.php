<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function userlogin(Request $request)
    {
        if($request->email == 'admin@gmail.com' && $request->password == 'admin@123')
        {
            session()->put('loginsuccess', 'Logged In Successfully');
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->route('login')->with('loginerror','Invalid Username or Password');
        }
    }
    public function logout()
    {
        // dd(Session::get('loginsuccess'));
        Session::flush();
        return redirect()->route('login')->with('loginsuccess','Logged Out Successfully');
    }
}
