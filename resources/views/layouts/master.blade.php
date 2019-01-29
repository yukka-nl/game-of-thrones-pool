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
    <div class="row">
        <div class="col-12 text-center mt-5 mb-4">
            <a href="/">
                <img src="{{ URL::asset('img/header.png') }}" style="height: 40px;">
            </a>
            @auth
                <div class="mt-5">
                    <div>
                        <img src="{{ Auth::user()->avatar }}" class="rounded-circle mr-2" style="height: 50px">
                        Logged in as <strong>{{ Auth::user()->name }}</strong> <span class="text-muted">(0 points)</span>
                        <br>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary mt-1">
                            Groups <a href="#" class="ml-1 badge badge-light">4</a>
                        </button>

                        <button class="btn btn-primary mt-1">
                            Your prediction
                        </button>

                        <button class="btn btn-primary mt-1">
                            Settings
                        </button>

                        <button class="btn btn-primary mt-1">
                            Sign out
                        </button>
                    </div>
                </div>
            @endauth
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 align-items-end d-none d-md-flex">
                <img src="{{ URL::asset('img/header-topleft.png') }}">
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <img src="{{ URL::asset('img/header-topright.png') }}">
            </div>
        </div>
    </div>
    <snow></snow>

    @yield('content')

</div>
</body>

<script src="{{ URL::asset('js/app.js') }}"></script>
</html>
