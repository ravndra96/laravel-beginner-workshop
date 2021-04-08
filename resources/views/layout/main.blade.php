<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <!-- bootstrap5 css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!--<link href="{{ asset('css/style.css') }}" rel="stylesheet">-->
    </head>
    <body>
        @include('snippets.header')
        <div class='container'>
            @yield('content')
        </div>
        <!--@include('snippets.footer')-->
        <!-- bootstrap5 js -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
