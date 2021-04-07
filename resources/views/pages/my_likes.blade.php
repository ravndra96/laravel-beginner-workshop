@extends('layout.main')
@section('title','My Likes')
@section('content')
@if (session('success'))
<div class="success" style="color:teal">
    {{ session('success') }}
</div>
@endif
<table style="width:100%;margin-top:15px">
    <thead>
    <th>Title</th>
    <th>Action</th>
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
@endsection