<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        $this->validate($request,[
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);
        
        //store user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request ->password),
            ]            
        );

        
        // sign the user in
        auth()->attempt($request->only('username','password'));
        //redirect
        return redirect()->route('dashboard');
    }
}
