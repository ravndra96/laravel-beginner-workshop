@extends('layout.main')
@section('title',Auth::user()->name)
@section('content')
@if (session('success'))
<div class="success" style="color:teal">
    {{ session('success') }}
</div>
@endif
<a class="justify-content-end mb-3 btn btn-sm btn-outline-primary" href='/create_post' class="">Create Post</a>
<?php
if (Auth::user()->posts->count() <= 0) {
    ?>
    <h5>No post</h5>
<?php } else {
    ?>
    <?php
    foreach (Auth::user()->posts as $post) {
        ?>
        <div class="row post-div">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post->title ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $post->content ?></h6>
                        <p class="card-text"><?php echo 'Total likes: ' . $post->likes()->count() ?></p>
                        <a class="btn btn-sm btn-outline-primary" href="/newsfeed/<?php echo $post->handle ?>">View</a>
                        <a class="btn btn-sm btn-outline-success" href="/edit_post/<?php echo $post->id ?>">Edit</a>
                        <a class="btn btn-sm btn-outline-danger" href="/delete_post/<?php echo $post->id ?>">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
<?php }
?>
@endsection