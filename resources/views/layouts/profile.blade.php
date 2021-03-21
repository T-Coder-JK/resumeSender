<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panghao Wu</title>
    <!-- Font Style -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;500;600&display=swap">
    <!-- Website Shortcut Icon -->
    <link rel="shortcut icon" href="{{ asset('startup.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/profiles/profile.css') }}" rel = "stylesheet"> 
    <!-- Scripts -->
    <script src="{{ asset('js/profiles/panghao.js') }}" defer></script>
</head>
<body>
    <main>@yield('content')</main>
</body>
</html>