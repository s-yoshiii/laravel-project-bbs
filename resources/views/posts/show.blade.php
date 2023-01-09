<x-layout>
    <x-slot name="title">{{ $post->title }} | My BBS</x-slot>
    <div class="back-link">&laquo; <a href="{{ route('posts.index') }}">Back</a></div>
    <h1>
        <span>{{ $post->title }}</span>
        <a href="{{ route('posts.edit', $post) }}">[Edit]</a>
        <form action="{{ route('posts.destroy', $post)}}" method="post" id="delete_post">
            @method('DELETE')
            @csrf
            <button class="btn">[x]</button>
        </form>
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>
    <h2>Comments</h2>
    <form action="{{ route('comments.store', $post) }}" method="post">
        @csrf
        <div class="comment-form">
            <input type="text" name="body">
            <button>Add</button>
        </div>
    </form>
    <ul>
        @foreach ($post->comments as $comment)
        <li>{{ $comment->body }}</li>
        @endforeach
    </ul>
    <script>
        'use strict';
        {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();
                if(!confirm('Sure to delete?')){
                    return;
                }
                e.target.submit();
            });
        }
    </script>
</x-layout>

