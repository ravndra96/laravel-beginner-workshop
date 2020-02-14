@extends('layout.main')
@section('title',Auth::user()->name)
@section('content')
@if (session('success'))
<div class="success" style="color:teal">
    {{ session('success') }}
</div>
@endif
<a href='/create_post' class="">Create Post</a>
<table style="width:100%;margin-top:15px">
    <thead>
    <th>ID</th>
    <th>Title</th>
    <th>Action</th>
</thead>
<tbody>
    <?php
    if (Auth::user()->posts->count() <= 0) {
        ?>
    <tr><td colspan="2">No Post</td></tr>
        <?php
    }else{
        foreach(Auth::user()->posts as $post){
        ?>
    <tr>
        <td><?php echo $post->id ?></td>
        <td><?php echo $post->title.' ('.$post->likes()->count().')' ?></td>
        <td>
            <a href="/newsfeed/<?php echo $post->handle ?>">View</a>
            <a href="/edit_post/<?php echo $post->id ?>">Edit</a>
            <a href="/delete_post/<?php echo $post->id ?>">Delete</a>
        </td>
    </tr>
    <?php
        }
    }
    ?>
</tbody>
</table>
@endsection