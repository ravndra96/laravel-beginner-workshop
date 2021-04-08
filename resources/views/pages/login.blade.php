@extends('layout.main')
@section('title','Login')
@section('content')
@if ($errors->any())
<div class='row mt-4 justify-content-center'>
    <div class='col col-8'>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li >{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

<div class='row mt-5 justify-content-center'>
    <div class='col col-3'>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5">Login Here</h5>
                <form method="post" action="/login" >
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value='{{ old('email') }}'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary login-button">Log In</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery library 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 Bootstrap JavaScript 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 Load JavaScript -->
@endsection