<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        # code...
        $this->middleware('guest');
    }

    public function index(Request $request)
    {
        # code...
       

        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //attempt login
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return  back()->with('status','Invalid login details');
        }
        # code...
        return redirect()->route('dashboard');
    }
}
