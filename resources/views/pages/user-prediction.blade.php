@extends('layouts.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Predictions of {{ $user->name }}</li>
        </ol>
    </nav>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-light mb-4">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <img src="{{ $user->avatar }}" class="rounded-circle mr-2" style="height: 75px">
                        </div>
                        <h1 class="h4">Predictions of {{ $user->name }}</h1>
                        <span class="h5 text-muted">Correct guesses: {{ $user->correct_guesses }}</span>
                        @auth
                            @if(Auth::id() === $user->id && $user->hasPredictions() && !config('app.lockdown'))
                                <div class="mt-2">
                                    <a href="/prediction/edit" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit your prediction
                                    </a>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>

                @auth
                    @if(Auth::id() === $user->id)
                        <div class="text-center mb-3">
                            @include('partials.share-buttons')
                        </div>
                    @endif
                @endauth

                @if(!$user->hasPredictions())
                    @if(Auth::check())
                        @if(Auth::id() === $user->id)
                            You haven't made any predictions yet.
                            <a href="/prediction/create">
                                Click here to make a prediction.
                            </a>
                        @endif
                    @else
                        This user did not make a prediction yet.
                    @endif
                @endif

                @if($user->hasPredictions())
                    @isset($groupedPredictions[1])
                        <div class="card bg-green mb-3">
                            <div class="card-body text-white pl-3 pr-3 pt-3 pb-3">
                                <h1 class="h4 m-0"><i class="fas fa-heartbeat mr-1"></i> Stays alive</h1>
                            </div>
                        </div>
                        @include('partials.character-sheet', ['predictions' => $groupedPredictions[1]])
                    @endisset

                    @isset($groupedPredictions[2])
                        <div class="card bg-red mb-3 mt-4">
                            <div class="card-body text-white pl-3 pr-3 pt-3 pb-3">
                                <h1 class="h4 m-0"><i class="fas fa-skull-crossbones mr-1"></i> Dies</h1>
                            </div>
                        </div>
                        @include('partials.character-sheet', ['predictions' => $groupedPredictions[2]])
                    @endisset

                    @isset($groupedPredictions[3])
                        <div class="card bg-blue mb-3 mt-4">
                            <div class="card-body text-white pl-3 pr-3 pt-3 pb-3">
                                <h1 class="h4 m-0"><i class="fas fa-skull mr-1"></i> Dies and becomes a wight</h1>
                            </div>
                        </div>
                        @include('partials.character-sheet', ['predictions' => $groupedPredictions[3]])
                    @endisset
                @endif
            </div>
        </div>
    </div>
@endsection