<x-layout>
    <x-slot name="title">Add New Post | My BBS</x-slot>
    <div class="back-link">&laquo; <a href="{{ route('posts.index') }}">Back</a></div>
    <h1>Add New Post</h1>
    <form action="" method="post">
        @csrf
        <div class="form-group"><label>Title <input type="text" name="title"></label></div>
        <div class="form-group"><label>Body <textarea name="body"></textarea></label></div>
        <div class="form-button"><button type="submit">Add</button></div>
    </form>
</x-layout>

