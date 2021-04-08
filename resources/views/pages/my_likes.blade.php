@extends('layout.main')
@section('title','My Likes')
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
<div class='row justify-content-center mt-5'>
    <div class='col col-5'>
        <div class='card'>
            <div class="card-body">
                <h5 class="card-title my-2">My Likes</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (Auth::user()->likes->count() <= 0) {
                            ?>
                            <tr><td colspan="2">No Liked Posts</td></tr>
                            <?php
                        } else {
                            foreach (Auth::user()->likes as $post) {
                                ?>
                                <tr>
                                    <td><a href='/newsfeed/<?php echo $post->handle ?>'><?php echo $post->title ?></a></td>
                                    <td><a href="/newsfeed/<?php echo $post->handle ?>/dislike">Dislike</a></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection