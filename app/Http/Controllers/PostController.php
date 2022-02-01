<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('posts.index');
    }

    public function store(Request $request)
    {
        # code...
        $this->validate($request,[
            'body' => 'required',
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);
        
        return back();
    }
}
