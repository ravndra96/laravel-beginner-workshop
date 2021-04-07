@extends('layout.main')
@section('title')
<?php echo (Auth::check()) ? Auth::user()->name : env('APP_NAME') ?>
@endsection
@section('content')
<h3>Welcome to Social Network</h3>
<?php
if (Auth::check()) {
    ?>
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Total My Publish Posts - <?php echo Auth::user()->posts()->count() ?></li>
            <li class="list-group-item">Total My Likes - <?php echo Auth::user()->likes()->count() ?></li>
            <?php
            $total_likes_on_posts = 0;
            foreach (Auth::user()->posts as $post) {
                $total_likes_on_posts += $post->likes()->count();
            }
            ?>
            <li class="list-group-item">Total Likes on my posts - <?php echo $total_likes_on_posts; ?></li>
        </ul>
    </div>
    <?php
} else {
    ?>
    <h5>Please <a href="/login">login</a> or <a href="/register">register</a> to get started.</h5>
    <?php
}
?>
@endsection  