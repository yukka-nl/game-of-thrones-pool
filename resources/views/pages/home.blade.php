@extends('layouts.master')

@section('content')
    <div class="container card mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1 class="h2">Winter has arrived: it's death pool time.</h1>
                <p>
                    Season 8 of Game of Thrones will start soon. Not all your beloved characters
                    will survive the threat of the white walkers. Create a pool with your friends to predict the fate
                    of all remaining characters. Beat your friends by earning the most points or compete in the global
                    leaderboards.
                </p>

                <p>
                    We are working on some exciting new features, such as global statistics based on all submitted
                    predictions. Follow us on <a target="_blank" rel="noopener"
                                                 href="https://twitter.com/yukkasoftware">Twitter</a> or <a
                            target="_blank" rel="noopener" href="https://www.facebook.com/YukkaSoftwareSolutions">Facebook</a>
                    to stay up-to-date!

                </p>
            </div>
            <div class="col-sm-12 col-md-6 d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <make-prediction-button is-authenticated="{{ Auth::check() }}"
                                            made-predictions="{{ Auth::check() && Auth::user()->hasPredictions() }}"
                                            user-id="{{ Auth::id() }}">
                    </make-prediction-button>
                    @if(Auth::check() && Auth::user()->hasPredictions())
                        <div class="mt-2">
                            <a href="/prediction/edit"><i class="fas fa-pencil-alt"></i> Edit your prediction</a>
                        </div>
                    @endif

                    @guest
                        <div class="mt-3 mb-1">
                            Already made a prediction? Sign into see your groups!
                        </div>
                        @include('partials.social-login-buttons')
                    @endguest
                </div>
            </div>
        </div>
    </div>

    @guest
        <div class="container card mb-3 card p-4 text-center">
            <div class="row features">
                <div class="col-sm">
                    <i class="fas fa-skull-crossbones"></i>
                    <h2 class="h4">
                        Make predictions
                    </h2>
                    <p class="text-muted">
                        Which characters will die, stay alive or turn into a wight?
                    </p>
                </div>
                <div class="col-sm">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <h2 class="h4">
                        Join groups with friends
                    </h2>
                    <p class="text-muted">
                        Join as many groups as you like or invite your friends to your groups.
                    </p>
                </div>
                <div class="col-sm">
                    <i class="fas fa-trophy"></i>
                    <h2 class="h4">
                        Compete in the leaderboards
                    </h2>
                    <p class="text-muted">
                        Beat others in the global or group leaderboards!
                    </p>
                </div>
            </div>
        </div>
    @endguest

    <div class="container card mb-3 card">
        <div class="row">
            <div class="col-6 col-md-6 p-4" style="z-index: 9;">
                <div class="d-flex align-items-center">
                    <h1 class="h2 d-inline mr-2">Statistics</h1>
                </div>
                <p>
                    We've published a page with realtime statistics based on all the submitted predictions so far. Find
                    out what most people predict!
                </p>

                <a href="/statistics" class="btn btn-outline-secondary mt-2 d-inline-block">
                    <i class="fas fa-chart-area mr-1"></i> Go to the statistics page
                </a>

            </div>
            <div class="col-6 col-md-6 d-flex justify-content-center align-items-center p-0">
                <div style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0)), url('/img/statistics-preview.png'); background-size:cover"
                     class="w-100 h-100"></div>
            </div>
        </div>
    </div>

    <div class="container card  mt-3 mb-3 card p-4 text-center">
        <div class="d-flex align-items-center justify-content-center">
            <h1 class="h2 d-inline mr-2">Battle of the Houses</h1>
            <span class="badge badge-success h4" style="font-size:0.9rem">new</span>
        </div>
        <div class="container p-0 mb-2">
            <houses-leaderboard :data="{{ json_encode($leaderboard) }}"></houses-leaderboard>
        </div>
    </div>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h2">Global leaderboards</h1>
                <span class="text-muted">Total users: {{ $userCount }}</span>

                <div class="container p-0">
                    <leaderboard :data="{{ json_encode($leaderboard) }}"></leaderboard>
                </div>
            </div>

        </div>
    </div>
@endsection