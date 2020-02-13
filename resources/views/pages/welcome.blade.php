@extends('layout.main')

@section('content')
<div class="title m-b-md">
    <?php echo env('APP_NAME') ?>
</div>
<div class="links">
    <?php
    if (Auth::check()) {
        ?>
        <a href="/home">Home</a>

        <?php
    } else {
        ?>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <?php
    }
    ?>
    <a href="/posts">Posts</a>

</div>
@endsection  