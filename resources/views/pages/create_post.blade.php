@extends('layout.main')
@section('title',Auth::user()->name)
@section('content')
<form method="post" action="/save_post">
    <div class="form-group">
        <label>Title:</label>
        <input type="text" class="form-control" name="title" value='{{ old('title') }}'>
    </div>
    <div class="form-group">
        <label>Content:</label>
        <textarea type="text" class="form-control" name="content" value='{{ old('content') }}'>
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    @csrf
</form>
@endsection