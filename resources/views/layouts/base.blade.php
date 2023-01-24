<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <x-header-script/>
    @yield('scripts')
    @vite('resources/js/app.js')
</head>
<body>
@include('layouts.header')
@include('layouts.messages.success')
@yield('content')
@include('layouts.footer')
@stack('js')
</body>
</html>
