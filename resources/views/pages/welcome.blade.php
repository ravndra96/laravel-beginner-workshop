@extends('layout.main')
@section('title')
<?php echo (Auth::check()) ? Auth::user()->name : env('APP_NAME') ?>
@endsection
@section('content')
<h3>Welcome to Social Network</h3>
<?php
if (Auth::check()) {
    ?>
    <h5>Total My Publish Posts -  <?php echo Auth::user()->posts()->count() ?></h5> 
    <h5>Total My Likes - <?php echo Auth::user()->likes()->count() ?></h5>
    <h5> 
        <?php
        $total_likes_on_posts = 0;
        foreach (Auth::user()->posts as $post) {
            $total_likes_on_posts += $post->likes()->count();
        }
        ?>
        Total Likes on my posts - <?php echo $total_likes_on_posts; ?>
    </h5>
    <?php
} else {
    ?>
    <h5>Please <a href="/login">login</a> or <a href="/register">register</a> to get started.</h5>
    <?php
}
?>
@endsection  