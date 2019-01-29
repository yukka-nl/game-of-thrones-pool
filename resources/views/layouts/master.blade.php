<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pool of Dragons</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
</head>
<body>
<div id="app" class="container p-0">
    @include('partials.header')
    {{--<snow></snow>--}}

    @yield('content')
</div>
</body>

<script src="{{ URL::asset('js/app.js') }}"></script>
</html>
