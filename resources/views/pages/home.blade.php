@extends('layouts.master')

@section('content')
    @include('partials.about')

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

    <div class="container card mt-3 mb-3 card p-4 text-center">
        <div class="d-flex align-items-center justify-content-center">
            <div>
                <h1 class="h2 d-inline mr-2">Battle of the Houses</h1>
            </div>
        </div>
        <div class="container p-0">
            <houses-leaderboard :lockdown="{{ json_encode(config('app.lockdown'))}}"
                                :user-logged-in="{{ json_encode(Auth::check()) }}"
                                :user-house-id="{{ json_encode(Auth::check() ? Auth::user()->house_id : null ) }}">
            </houses-leaderboard>
        </div>
    </div>


{{--    <div class="container card  mt-3 mb-3 card p-4">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-12">--}}
{{--                <h1 class="h2">Houses leaderboards</h1>--}}

{{--                <div class="container p-0">--}}
{{--                    <houses-leaderboard-table></houses-leaderboard-table>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h2">Global leaderboards</h1>
                <span class="text-muted">Total users: {{ $userCount }}</span>

                <div class="container p-0">
                    @if(config('app.lockdown'))
                    <global-leaderboard></global-leaderboard>
                    @else
                    <div class="alert alert-warning mt-3" role="alert">
                        Due to high demand (yay!) we disabled the leaderboard until the episode starts.
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection