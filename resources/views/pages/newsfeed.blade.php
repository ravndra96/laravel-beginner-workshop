@extends('layout.main')
@section('title','News Feed')
@section('content')
@if (session('success'))
<div class="success" style="color:teal">
    {{ session('success') }}
</div>
@endif
<h3 class="text-center">New Posts</h3>
<?php if (count($posts) > 0) { ?>
    <?php
    foreach ($posts as $post) {
        ?>
        <div class="row post-div">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post->title ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $post->content ?></h6>
                        <p class="card-text"><?php echo 'Total likes: ' . $post->likes()->count() ?></p>
                        <a href="/newsfeed/{{ $post->handle }}">Go to post</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
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