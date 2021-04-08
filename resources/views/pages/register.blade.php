@extends('layout.main')
@section('title','Register')
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
                <h5 class="card-title mb-5">Register Here</h5>
                <form method="post" action="/register" class="signup-form">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value='{{ old('name') }}'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value='{{ old('email') }}'>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary signup-button" style="width:100%">Sign Up</button>
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