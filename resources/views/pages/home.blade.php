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