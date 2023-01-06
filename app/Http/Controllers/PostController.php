<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('index')
            ->with(['posts' => $posts]);
    }
    // Implicit Binding
    public function show(Post $post)
    {
        return view('posts.show')
            ->with(['post' => $post]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()
            ->route('posts.index');
    }
}
