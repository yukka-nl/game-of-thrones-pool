<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-104461895-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-104461895-2');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <meta property="og:site_name" content="Pool of Dragons">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:image" content="{{ URL::asset('img/site-preview.png') }}"/>
    <meta property="og:image:secure_url" content="{{ URL::asset('img/site-preview.png') }}">
    <meta property="og:description"
          content="Season 8 of Game of Thrones will start soon. Not all your beloved characters will survive the threat
          of the white walkers. Create a pool with your friends to predict the faith of all remaining characters. Beat
          your friends by earning the most points or compete in the global leaderboards. ">
    <meta property="og:title" content="Pool of Dragons. Winter has arrived: it's death pool time.">

    <title>Pool of Dragons</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<div id="app" class="container p-0 mb-4 pr-1 pl-1">
    @include('partials.header')
    <snow></snow>


    @if(Auth::check() && !Auth::user()->house_id)
        <div class="container card alert-primary mb-3 card p-4 text-center">
            <div class="d-flex align-items-center justify-content-center">
                <div>
                    <h1 class="h2 d-inline mr-2">You haven't joined a house yet. Click on a sigil to join a house.</h1>
                    <span class="badge badge-success h4 d-inline" style="font-size:0.9rem">new</span>
                </div>
            </div>
            <div class="container p-0">
                <houses-leaderboard :user-logged-in="{{ json_encode(Auth::check()) }}"
                                    :user-house-id="{{ json_encode(Auth::check() ? Auth::user()->house_id : null ) }}"
                                    :hide-stats="true"
                                    :refresh-after-join="true">
                </houses-leaderboard>
            </div>
        </div>
    @endif


@if(session('message'))
        <div class="alert alert-success animated flash" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @yield('content')
</div>

<footer class="container mb-3 p-4 text-center text-white">
    <div class="mb-3">
        <a href="https://yukka.nl/en" class="text-white" target="_blank" rel="noopener">
            <img src="/img/yukka.png" style="width: 50px;">
        </a>
    </div>

    <div class="footer-text">
        <a href="https://yukka.nl/en" class="text-white" target="_blank" rel="noopener">
            Website made by
            <u>
                Yukka Software Solutions
            </u>
        </a>
        <br>
        <a href="/privacy" class="text-white">Privacy</a>
        -
        <a href="/terms-of-service" class="text-white">Terms Of Service</a>
        <br>
        <a href="https://awoiaf.westeros.org/index.php/List_of_houses" class="text-white small" target="_blank" rel="noopener">
            House sigils credits to
            <u>
                awoiaf.westeros.org
            </u>
        </a>
    </div>
</footer>
</body>

<script src="/js/app.js"></script>

</html>
