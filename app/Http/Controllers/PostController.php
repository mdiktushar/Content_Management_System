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
}
