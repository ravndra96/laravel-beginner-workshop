@extends('layout.main')

@section('content')
<div class="title m-b-md">
    <?php echo env('APP_NAME') ?>
</div>
<div class="links">
    <a href="/login">Login</a>
    <a href="/register">Register</a>
    <a href="/posts">Posts</a>
</div>
@endsection  