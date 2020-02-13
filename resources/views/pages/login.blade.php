@extends('layout.main')
@section('title','Login')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style='color:red;'>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="/login">
    <div class="form-group">
        <label>Email address</label>
        <input type="text" class="form-control" name="email" value='{{ old('email') }}'>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    @csrf
</form>

<!-- jQuery library 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 Bootstrap JavaScript 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 Load JavaScript -->
@endsection