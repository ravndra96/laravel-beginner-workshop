@extends('layout.main')
@section('title')
<?php echo (Auth::check()) ? Auth::user()->name : env('APP_NAME') ?>
@endsection
@section('content')
<h3 class='text-center my-5 fw-bold'>Welcome to Social Network</h3>
<?php
if (Auth::check()) {
    ?>
    <div class='row mt-5 justify-content-center'>
        <div class='col col-3'>
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-start">Total My Publish Posts <span class='badge bg-primary'><?php echo Auth::user()->posts()->count() ?></span></li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">Total My Likes <span class='badge bg-primary'><?php echo Auth::user()->likes()->count() ?></span></li>
                    <?php
                    $total_likes_on_posts = 0;
                    foreach (Auth::user()->posts as $post) {
                        $total_likes_on_posts += $post->likes()->count();
                    }
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">Total Likes on my posts <span class='badge bg-primary'><?php echo $total_likes_on_posts; ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>

    <h5 class='text-center my-5 fw-bold'>Please <a href="/login">login</a> or <a href="/register">register</a> to get started.</h5>

    <?php
}
?>
@endsection  