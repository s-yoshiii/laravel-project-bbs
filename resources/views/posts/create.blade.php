<x-layout>
    <x-slot name="title">Add New Post | My BBS</x-slot>
    <div class="back-link">&laquo; <a href="{{ route('posts.index') }}">Back</a></div>
    <h1>Add New Post</h1>
    <form action="" method="post">
        @csrf
        <label>Title <input type="text" name="title"></label>
        <label>Body <textarea name="body"></textarea></label>
    </form>
</x-layout>

