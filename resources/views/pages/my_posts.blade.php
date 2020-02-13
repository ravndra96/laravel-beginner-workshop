@extends('layout.main')
@section('title',Auth::user()->name)
@section('content')
<a href='/create_post' class="">Create Post</a>
@endsection