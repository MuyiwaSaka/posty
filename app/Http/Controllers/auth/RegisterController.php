<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('auth.register');
    }

    public function store(Request $request)
    {
        # code...
        //validation
        dd($request->email());
        //store user
        // sign the user in
        //redirect
        return dd('abc');
    }
}
