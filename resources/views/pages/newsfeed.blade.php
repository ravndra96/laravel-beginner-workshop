@extends('layout.main')
@section('title','News Feed')
@section('content')
@if (session('success'))
<div class="success" style="color:teal">
    {{ session('success') }}
</div>
@endif
<h3 class="text-center mt-4">New Posts</h3>
<div class="row mt-4 post-div">
    <?php if (count($posts) > 0) { ?>
        <?php
        foreach ($posts as $post) {
            ?>

            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post->title ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php echo Str::words($post->content, 10, ' ...'); ?>
                        </h6>
                        <p class="card-text"><?php echo 'Total likes: ' . $post->likes()->count() ?></p>
                        <a href="/newsfeed/{{ $post->handle }}">View Full Post</a>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
    <nav class="post-pagination">
        <ul class="pagination justify-content-end">
            <li class="page-item">
                <a class="page-link" href="{{ $posts->url(1) }}">First</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ $posts->previousPageUrl() }}">Previous</a>
            </li>
            <?php
            if ($posts->lastPage() >= 1) {
                for ($i = 1; $i <= $posts->lastPage(); $i++) {
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="{{ $posts->url($i) }}"><?php echo $i ?></a>
                    </li>
                    <?php
                }
            }
            ?>
            <li class="page-item">
                <a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ $posts->url($posts->lastPage()) }}">Last</a>
            </li>
        </ul>
    </nav>
<?php } else {
    ?>
    <h5>No post</h5>
    <?php
}
?>
@endsection