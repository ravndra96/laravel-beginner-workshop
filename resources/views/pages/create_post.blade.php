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
<div class='row mt-5 justify-content-center'>
    <div class='col col-8'>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5">Create Post Here</h5>
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
            </div>
        </div>
    </div>
</div>
@endsection