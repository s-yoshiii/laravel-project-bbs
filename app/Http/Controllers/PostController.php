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
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ] , [
            'title.required' => 'タイトルは必須です。',
            'title.min' => ':min 文字以上入力してください。',
            'body.required' => '本文は必須です。',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()
            ->route('posts.index');
    }
    // Implicit Binding
    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ] , [
            'title.required' => 'タイトルは必須です。',
            'title.min' => ':min 文字以上入力してください。',
            'body.required' => '本文は必須です。',
        ]);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()
            ->route('posts.show', $post);
    }
}
