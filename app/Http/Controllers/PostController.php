<?php

namespace App\Http\Controllers;

// Models
use App\Models\Post;

//Vendor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    
    public function store(Request $request)
    {
        # code...
        $this->authorize('create', Post::class);
        $data = request()->validate([
            'title'=> 'required|min:8|max:150',
            'post_image'=> 'image',
            'body' => 'required'
        ]);

        if (request('post_image')) {
            $data['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($data);
        $request->session()->flash('post_save', "A New Post is Created");
        
        return redirect()->route('post.index');
    }

    public function index(Type $var = null)
    {
        # code...
        $posts= auth()->user()->posts()->paginate(5);
        // $posts = Post::all()->paginate();
        return view('admin.posts.index', ['posts'=> $posts]);
    }

    public function distroy(Post $post)
    {
        # code...
        $this->authorize('delete', $post);
        $post->delete();
        Session::flash('delete_message', 'Post is deleted');
        return back();
    }

    public function edit(Post $post)
    {
        # code...
        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request)
    {
        # code...
        $data = request()->validate([
            'title'=> 'required|min:8|max:150',
            'post_image'=> 'image',
            'body' => 'required'
        ]);

        if (request('post_image')) {
            $data['post_image'] = request('post_image')->store('images');
            $post->post_image = $data['post_image'];
        }

        $post->title = $data['title'];
        $post->body = $data['body'];

        $this->authorize('update', $post);

        // auth()->user()->posts()->save($post);
        $post->save();
        $request->session()->flash('post_update_message', "Post Is Updated...!");

        return back();
    }
}
