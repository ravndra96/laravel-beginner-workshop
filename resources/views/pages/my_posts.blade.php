@extends('layout.main')
@section('title',Auth::user()->name)
@section('content')
@if (session('success'))
<div class='row mt-4 justify-content-center'>
    <div class='col col-8'>
        <div class="alert alert-success" role="alert">
            <div class="success">
                {{ session('success') }}
            </div>
        </div>
    </div>
</div>
@endif
<div class='row mt-5 justify-content-center'>
    <div class='col col-3 text-center'>
        <a class="justify-content-center mb-3 btn btn-sm btn-outline-primary" href='/create_post' class="">Create Post</a>
    </div>
</div>
<?php
if (Auth::user()->posts->count() <= 0) {
    ?>
    <!--<h5>No posts</h5>-->
<?php } else {
    ?>
    <div class="row post-div justify-content-center">
        <?php
        foreach (Auth::user()->posts as $post) {
            ?>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post->title ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php echo $post->content ?>
                        </h6>
                        <p class="card-text"><?php echo 'Total likes: ' . $post->likes()->count() ?></p>
                        <a class="btn btn-sm btn-outline-primary" href="/newsfeed/<?php echo $post->handle ?>">View</a>
                        <a class="btn btn-sm btn-outline-success" href="/edit_post/<?php echo $post->id ?>">Edit</a>
                        <a class="btn btn-sm btn-outline-danger" href="/delete_post/<?php echo $post->id ?>">Delete</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
<?php }
?>
@endsection