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
<form method="post" action="/save_post" class="create-post-form">
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value='{{ old('title') }}'>
    </div>
    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea type="text" class="form-control" name="content" value='{{ old('content') }}'></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary create-button">Create</button>
    </div>
    @csrf
</form>
@endsection