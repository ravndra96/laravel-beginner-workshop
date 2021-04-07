@extends('layout.main')
@section('title',Auth::user()->name)
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style='color:red;'>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
<div class="success" style="color:teal">
    {{ session('success') }}
</div>
@endif
<form method="post" action="/edit_post/{{ $post->id }}" class="update-post-form">
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value='{{ $post->title }}'>
    </div>
    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea type="text" class="form-control" name="content" value=''>{{ $post->content }}</textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary update-post-button">Update</button>
    </div>
    @csrf
</form>
@endsection