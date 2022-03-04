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
        $data = request()->validate([
            'title'=> 'required|min:8|max:150',
            'post_image'=> 'image',
            'body' => 'required'
        ]);

        if (request('post_image')) {
            $data['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($data);
        return back();
    }

    public function index(Type $var = null)
    {
        # code...
        return view('admin.posts.index');
    }
}
