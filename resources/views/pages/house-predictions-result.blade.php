@extends('layouts.master')

@section('meta-images')
    <meta property="og:image" content="{{ URL::asset('img/both-update.png') }}"/>
    <meta property="og:image:secure_url" content="{{ URL::asset('img/both-update.png') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">House predictions</li>
        </ol>
    </nav>

    <div class="container card mt-3 mb-3 card p-4 house-predictions">
        <h1 class="h4">House predictions</h1>
        <hr>

        <div class="alert alert-primary d-flex justify-content-center" role="alert">
            <div class="col-sm-12 col-md-8 text-center">
                <img src="/img/sigils-by-id/{{ Auth::user()->house_id }}.svg" class="sigil mb-3 mt-2">
                <h1 class="h4 mb-2 text-center">
                    House Predictions
                </h1>
                <p class="mb-3 text-center">
                    Score points for your house, <strong>{{ Auth::user()->house->name }}</strong>, and lead it to victory. Be aware: the house
                    predictions are collective, which means that you vote for your prediction together with your
                    other house members. The predictions with the most votes will become the final prediction of
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

        <div class="row d-flex justify-content-center">
            @foreach($characters as $character)
                <div class="col-12 col-md-6 mt-4 text-center">
                    <div>
                        <img src="{{ URL::asset('img/characters/' . $character->image) }}"
                             class="rounded-circle w-100 mb-2"
                             style="max-height: 100px; max-width: 100px;">
                    </div>
                    <strong>
                        {{ $character->name }}
                    </strong>
                    <br>
                    <span class="text-muted">
                        Your vote: Alive
                    </span>
                    <br>

                    @foreach($houses as $house)
                        <img src="/img/sigils/{{ $house->image }}" style="height: 15px">
                        {{ $house->name }} - {{ $character->getTopPredictionForHouse($house)}}<br>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

@endsection