@extends('layout.main')
@section('content')
<div class="title m-b-md">
    <?php echo Auth::user()->name; ?>
</div>
<div class="links">
    <a href="/posts">Posts</a>
</div>

<!-- jQuery library 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 Bootstrap JavaScript 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 Load JavaScript -->
@endsection