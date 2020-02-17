@extends('layout.main')
@section('title','Post')
@section('content')
@if (session('success'))
<div class="success" style="color:teal">
    {{ session('success') }}
</div>
@endif
<h3><?php echo $post->title; ?></h3>
<div>
    <?php
    echo $post->content;
    ?>
</div>
<?php
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
?>
<?php
if (Auth::check() && $post->user_id == Auth::user()->id) {
    ?>
    <h4 class="">Likes</h4>
    <table style="width:100%;">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
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
    <?php
}
?>

@endsection