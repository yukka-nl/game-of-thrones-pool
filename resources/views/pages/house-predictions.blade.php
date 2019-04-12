@extends('layouts.master')

@section('meta-images')
    <meta property="og:image" content="{{ URL::asset('img/both-update.png') }}"/>
    <meta property="og:image:secure_url" content="{{ URL::asset('img/both-update.png') }}">
@endsection

@section('hide-house-prediction-cta')
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">House predictions</li>
        </ol>
    </nav>

    @guest
        <div class="container card mt-3 mb-3 card p-4">
            You need to be signed in to participate in the Battle of the Houses.

            @include('partials.social-login-buttons')
        </div>
    @endguest

    @if(Auth::check() && (!Auth::user()->house_id || !Auth::user()->hasPredictions))
        <div class="container card mt-3 mb-3 card p-4">

            <h1 class="h4 mb-2 text-center">
                House Predictions
            </h1>

            @if(!Auth::user()->hasPredictions)
                <div class="text-center">
                    You have to make your own predictions before you can participate in the battle of houses.
                    <br>

                    <a class="btn btn-primary btn-lg pulse-button mt-3" href="/prediction/create">
                        <i class="fab fa-wpforms mr-1"></i> Make your prediction
                    </a>
                </div>
            @endif

            @if(Auth::user()->hasPredictions)
                <div class="alert alert-warning mt-2">
                    <strong><i class="fas fa-exclamation-triangle"></i> You first need to join a house in order to make
                        house predictions. Choose your house.</strong>
                </div>

                <div class="container p-0">
                    <houses-leaderboard :lockdown="{{ json_encode(config('app.lockdown')) }}"
                                        :user-logged-in="{{ json_encode(Auth::check()) }}"
                                        :user-house-id="{{ json_encode(Auth::check() ? Auth::user()->house_id : null ) }}"
                                        :hide-stats="true"
                                        :hide-title="true"
                                        :refresh-after-join="true">
                    </houses-leaderboard>
                </div>
            @endif
        </div>

    @endif

    @if(Auth::check() && Auth::user()->house_id && Auth::user()->hasPredictions)
        <div class="container card mt-3 mb-3 card p-4 house-predictions">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-12">
                    <div class="alert alert-primary d-flex justify-content-center" role="alert">
                        <div class="col-sm-12 col-md-8 text-center">
                            <img src="/img/sigils-by-id/{{ Auth::user()->house_id }}.svg" class="sigil mb-3 mt-2">
                            <h1 class="h4 mb-2 text-center">
                                House Predictions
                            </h1>
                            <p class="mb-3 text-center">
                                Score points for your house, <strong>{{ Auth::user()->house->name }}</strong>, and lead
                                it to victory. Be aware: the house
                                predictions are collective, which means that you vote for your prediction together with
                                your
                                other house members. The predictions with the most votes will become the final
                                prediction of
                                the house.
                            </p>
                            <p class="text-center">
                                <strong>
                                    These predictions are only for the house leaderboards and do not
                                    count for the global or group leaderboards.
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <house-prediction-form
                    :characters="{{ $houseCharacters }}"
                    :questions="{{ $houseQuestions }}"
                    username="{{ Auth::user()->name }}"
                    user-id="{{ Auth::id() }}"
                    :house="{{ Auth::user()->house }}">
            </house-prediction-form>
        </div>
    @endif

@endsection