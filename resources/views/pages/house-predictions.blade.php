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

    @if(!Auth::user()->house_id)
        <div class="container card mt-3 mb-3 card p-4">
            <h1 class="h4 mb-2 text-center">
                House Predictions
            </h1>
            You first need to join a house in order to make house predictions.
            <div class="container p-0">
                <houses-leaderboard :user-logged-in="{{ json_encode(Auth::check()) }}"
                                    :user-house-id="{{ json_encode(Auth::check() ? Auth::user()->house_id : null ) }}"
                                    :hide-stats="true"
                                    :hide-title="true"
                                    :refresh-after-join="true">
                </houses-leaderboard>
            </div>
        </div>
    @endif

    @if(Auth::user()->house_id)
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
                    username="{{ Auth::user()->name }}"
                    user-id="{{ Auth::id() }}"
                    :house="{{ Auth::user()->house }}"
                    :houses="{{ $houses }}">
            </house-prediction-form>
        </div>
    @endif

@endsection