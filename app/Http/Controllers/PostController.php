<?php

namespace App\Http\Controllers;

// Models
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function show(Post $post)
    {
        # code...
        return view('blog-post', ['post' => $post]);
    }

    public function create(Type $var = null)
    {
        # code...
        return view('admin.posts.create');
    }
    
    public function store(Type $var = null)
    {
        # code...
        auth()->user();
        dd(request()->all());
    }
}
