<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('list', compact('posts'));
    }

    
    public function show($id)
    {
        $post = Post::find($id);
        if(Auth::user()->can('view', $post)){ // can xai bth
            return view('show', compact('post'));
        }else{
            abort(403);
        }
       
    }

}
