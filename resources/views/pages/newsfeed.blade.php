@extends('layout.main')
@section('title','News Feed')
@section('content')
@if (session('success'))
<div class="success" style="color:teal">
    {{ session('success') }}
</div>
@endif
<h3>New Posts</h3>
<?php
if (count($posts) > 0) {
    foreach ($posts as $post) {
        ?>
        <h5><a href="/newsfeed/{{ $post->handle }}"><?php echo $post->title ?></a></h5>
        <?php
    }
    ?>
    <?php
} else {
    ?>
    <h5>No Post</h5>
    <?php
}
?>
{{-- $posts->links() --}}

<?php
// dd($posts->lastPage());
?>

<?php
if (count($posts) > 0) {
    ?>
    <div class="pagination">
        <a href="{{ $posts->url(1) }}">First</a>
        <a href="{{ $posts->previousPageUrl() }}">Previous</a>
        <?php
        if ($posts->lastPage() > 2) {
            for ($i = 1; $i <= $posts->lastPage(); $i++) {
                ?>
                <a href="{{ $posts->url($i) }}"><?php echo $i ?></a>
                <?php
            }
        }
        ?>
        <a href="{{ $posts->nextPageUrl() }}">Next</a>
        <a href="{{ $posts->url($posts->lastPage()) }}">Last</a>
    </div>
    <?php
}
?>
@endsection