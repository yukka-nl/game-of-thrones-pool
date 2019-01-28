<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
</head>
<body>
<div id="app" class="container">
    <div class="row">
        <div class="col-12 text-center mt-5 mb-5">
            <img src="{{ URL::asset('img/header.png') }}" style="height: 40px;">
        </div>
    </div>

    @yield('content')
</div>
</body>
</html>
