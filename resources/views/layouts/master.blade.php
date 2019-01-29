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

    <div class="container">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-end">
                <img src="{{ URL::asset('img/header-topleft.png') }}">
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <img src="{{ URL::asset('img/header-topright.png') }}">
            </div>
        </div>
    </div>
    @yield('content')
</div>
</body>

<script src="{{ URL::asset('js/app.js') }}"></script>
</html>
