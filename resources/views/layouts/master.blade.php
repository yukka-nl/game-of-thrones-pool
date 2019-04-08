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

    @if(View::hasSection('meta-images'))
        @yield('meta-images')
    @else
        <meta property="og:image" content="{{ URL::asset('img/site-preview.png') }}"/>
        <meta property="og:image:secure_url" content="{{ URL::asset('img/site-preview.png') }}">
    @endif

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
    @if(!View::hasSection('hide-house-prediction-cta'))
        @if(Auth::check() && Auth::user()->house_id && Auth::user()->hasPredictions())
            <div class="container card alert-primary mb-3 card p-4 text-center">
                <div class="d-flex justify-content-center">
                    <img src="/img/sigils-by-id/{{ Auth::user()->house_id }}.svg" class="sigil mb-3 mt-2"
                         style="width: 75px">
                </div>
                <h1 class="h4 mb-2 text-center">
                    Make your house predictions now!
                </h1>

                <div class="text-center small-avatars mt-3 mb-3">
                    <img src="/img/characters/drogon.jpeg" class="rounded-circle">
                    <img src="/img/characters/rhaegal.jpeg" class="rounded-circle">
                    <img src="/img/characters/meera_reed.jpeg" class="rounded-circle">
                    <img src="/img/characters/robin_arryn.jpeg" class="rounded-circle">
                    <img src="/img/characters/lyanna_mormont.jpeg" class="rounded-circle">
                    <img src="/img/characters/yohn_royce.jpeg" class="rounded-circle">
                    <img src="/img/characters/edmure_tully.jpeg" class="rounded-circle">
                </div>

                <p class="mb-3 text-center">
                    You have joined <strong>{{ Auth::user()->house->name }}</strong>. You can now predict the fate of
                    the  remaining characters, such as the dragons, to score points for your house.
                </p>

                <p class="text-center">
                    <strong>
                        These predictions are only for the house leaderboards and do not
                        count for the global or group leaderboards.
                    </strong>
                </p>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-primary btn-lg pulse-button" href="/predictions/house">
                        <i class="fab fa-wpforms mr-1"></i> Make your house prediction
                    </a>
                </div>
            </div>
        @endif
    @endif

    @if(Auth::check() && !Auth::user()->house_id && Auth::user()->hasPredictions())
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


    <footer class="container mb-3 p-4 text-center text-white">
        <div class="mb-3">
            <a href="https://yukka.nl/en" class="text-white" target="_blank" rel="noopener">
                <img src="/img/yukka.png" style="width: 50px;">
            </a>
        </div>

        <div>
            <a href="https://yukka.nl/en" class="footer-text text-white" target="_blank" rel="noopener">
                Website made by
                <u>
                    Yukka Software Solutions
                </u>
            </a>
            <br>
            <a href="/privacy" class="footer-text text-white">Privacy</a>
            -
            <a href="/terms-of-service" class="footer-text text-white">Terms Of Service</a>
            <br>
            <sigils-credits text-class="text-white footer-text" label-text="House sigils credits"></sigils-credits>

        </div>
    </footer>
</div>

</body>

<script src="/js/app.js"></script>

</html>
