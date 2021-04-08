@extends('layout.main')
@section('title','Post')
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
<div class='row mt-4 justify-content-center'>
    <div class='col col-8'>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $post->title; ?></h5>
                <p class="card-text"><?php
                    echo $post->content;
                    ?></p>
                <a href="#" class="card-link"><?php
                    $total_likes = $post->likes->count();
                    if ($liked > 0) {
                        ?>
                        <a href="/newsfeed/<?php echo $post->handle ?>/dislike">Liked(<?php echo $total_likes; ?>)</a>
                        <?php
                    } else {
                        ?>
                        <a href="/newsfeed/<?php echo $post->handle ?>/like">Like(<?php echo $total_likes; ?>)</a>
                        <?php
                    }
                    ?></a>
            </div>
        </div>
    </div>
</div>

<?php
if (Auth::check() && $post->user_id == Auth::user()->id) {
    ?>
    <div class='row mt-5 justify-content-md-center'>
        <div class='col col-8'>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                View Likes
            </button>
        </div>
    </div>
    <div class='row mt-2 justify-content-md-center'>
        <div class='col col-8'>
            <div class="collapse" id="collapseExample">
                <div class="card">
                    <div class='card-body'>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($total_likes > 0) {
                                    foreach ($post->likes as $like) {
                                        ?>
                                        <tr>
                                            <td><?php echo $like->id ?></td>
                                            <td><?php echo $like->name ?></td>
                                            <td><?php echo $like->email ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="3">No Likes</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>            
    <?php
}
?>

@endsection
