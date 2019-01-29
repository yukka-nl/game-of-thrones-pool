@extends('layouts.master')

@section('content')
    <div class="container card mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1 class="h2">Winter has arrived. Death pool time.</h1>
                <p>
                    Season 8 of Game of Thrones will start soon. Not all your beloved characters
                    will survive the threat of the white walkers. Create a pool with your friends to predict the faith
                    of all remaining characters. Beat your friends by earning the most points or compete in the global
                    leaderboards.
                </p>
            </div>
            <div class="col-sm-12 col-md-6 d-flex justify-content-center align-items-center">
                <div class="text-center">
                    @if(Auth::check() && Auth::user()->hasPredictions() && Auth::check())
                        <a href="/prediction" class="btn btn-primary btn-lg">
                            <i class="fab fa-wpforms mr-1"></i> View your prediction
                        </a>
                    @else
                        <a href="/prediction/create" class="btn btn-primary btn-lg">
                            <i class="fab fa-wpforms mr-1"></i> Make your prediction
                        </a>
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
                    Join as many groups as you like, or invite your friends to your groups.
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
                <p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Correct guesses</th>
                        <th scope="col">Points</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 1; $i < 10; $i++)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>Mark</td>
                            <td>6</td>
                            <td>100</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
                </p>
            </div>

        </div>
    </div>
@endsection