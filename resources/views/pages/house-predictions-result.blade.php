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
        <h1 class="h4">House predictions results</h1>
        <hr>

        @guest
            <div class="text-center">
                Sign in to make your own predictions.

                @include('partials.social-login-buttons')
            </div>
        @endguest

        @auth
            @if(!Auth::user()->hasPredictions)
                <div class="text-center">
                    You have to make your own predictions before you can participate in the battle of houses.
                    <br>

                    <a class="btn btn-primary btn-lg pulse-button mt-3" href="/prediction/create">
                        <i class="fab fa-wpforms mr-1"></i> Make your prediction
                    </a>
                </div>
            @endif
        @endauth


        @if(Auth::check() && Auth::user()->house_id)
            <div class="alert alert-primary d-flex justify-content-center" role="alert">
                <div class="col-sm-12 col-md-8 text-center">
                    <img src="/img/sigils-by-id/{{ Auth::user()->house_id }}.svg" class="sigil mb-3 mt-2">
                    <h1 class="h4 mb-2 text-center">
                        House Predictions
                    </h1>
                    <p class="mb-3 text-center">
                        Score points for your house, <strong>{{ Auth::user()->house->name }}</strong>, and lead it to
                        victory. Be aware: the house
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
        @endif

        <div class="row d-flex justify-content-center pr-3 pl-3">

            @foreach($characters as $character)
                @php
                    $predictions["Alive"] = [];
                    $predictions["Dead"] = [];
                    $predictions["Wight"] = [];
                @endphp

                <div class="col-12 col-md-12 mt-4 text-center card bg-light p-3">
                    <div>
                        <img src="{{ URL::asset('img/characters/' . $character->image) }}"
                             class="rounded-circle w-100 mb-2"
                             style="max-height: 100px; max-width: 100px;">
                        <br>
                        <strong>
                            {{ $character->name }}
                        </strong>
                        <br>
                        @auth
                            <span class="text-muted">
                                Your vote: {{ Auth::user()->getPrediction($character)->status ?? '-' }}
                            </span>
                        @endauth
                    </div>

                    @foreach($houses as $house)
                        @php
                            $housePrediction = $character->getTopPredictionForHouse($house);
                            $predictions[$housePrediction->predictionStatus][] = $housePrediction;
                        @endphp
                    @endforeach

                    <div class="row">
                        <div class="col-12 col-md-4 mt-0 mt-md-3 text-center alert-success alert mt-3">
                            <h2 class="h5">Alive</h2>
                            @foreach($predictions["Alive"] as $house)
                                <div class="text-center d-inline-block m-1">
                                    <img src="/img/sigils/{{ $house->image }}" style="height: 30px" class="mouse-over"
                                         data-toggle="tooltip" data-placement="top" title="{{ $house->name }}"><br>
                                    <span class="badge badge-success">{{ $house->predictionPercentage }}%</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 col-md-4 mt-0 mt-md-3 text-center alert-danger alert">
                            <h2 class="h5">Dead</h2>
                            @foreach($predictions["Dead"] as $house)
                                <div class="text-center d-inline-block m-1">
                                    <img src="/img/sigils/{{ $house->image }}" style="height: 30px" class="mouse-over"
                                         data-toggle="tooltip" data-placement="top" title="{{ $house->name }}"><br>
                                    <span class="badge badge-danger">{{ $house->predictionPercentage }}%</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 col-md-4 mt-0 mt-md-3 text-center alert-primary alert">
                            <h2 class="h5">Dies and becomes a wight</h2>
                            @foreach($predictions["Wight"] as $house)
                                <div class="text-center d-inline-block m-1">
                                    <img src="/img/sigils/{{ $house->image }}" style="height: 30px" class="mouse-over"
                                         data-toggle="tooltip" data-placement="top" title="{{ $house->name }}"><br>
                                    <span class="badge badge-primary">{{ $house->predictionPercentage }}%</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @foreach($questions as $question)
            <div class="col-12 col-md-12 mt-4 text-center card">
                <div class="p-3">
                    <strong>
                        {{ $question->title }}
                    </strong>
                    <br>
                    @auth
                        <span class="text-muted">
                            Your vote: {{ Auth::user()->getAnswer($question)->label ?? '-' }}
                        </span>
                    @endauth
                </div>

                <div class="row d-flex justify-content-center">
                    @foreach($houses as $house)
                        <div class="col-6 col-md-2 mt-0 mt-md-3 text-center alert-light alert">
                            <div class="text-center d-inline-block m-1">
                                <img src="/img/sigils/{{ $house->image }}" style="height: 30px"><br>
                                {!! $question->getTopPredictionForHouse($house) ?? '-'!!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

@endsection