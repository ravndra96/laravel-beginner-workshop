@extends('layout.main')
@section('title')
<?php echo (Auth::check()) ? Auth::user()->name : env('APP_NAME') ?>
@endsection
@section('content')
@endsection  