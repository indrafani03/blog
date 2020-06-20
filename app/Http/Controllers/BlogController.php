<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $data = Post::orderBy('created_at','desc')->get();

        return view('blog.index', ['posts' => $data]);
    
    }
    public function view($slug)
    {
        $post = Post::where('slug', $slug)->get();
        
        return view('blog.view', ['post' => $post]);
    }
}
