@extends('layouts.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Statistics</li>
        </ol>
    </nav>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h4 mb-3">Statistics</h1>
                <div class="container p-0">
                    <div class="row">
                        <div class="col-sm">
                            @include('partials.top-5-characters', [
                                                               'title' => 'Most predicted as alive',
                                                               'icon' => 'fas fa-heartbeat',
                                                               'background' => 'bg-green',
                                                               'characters' => $alive,
                                                               'statusField' => 'alive_prediction_count',
                                                               'predictionCount' => $totalPredictions
                                                               ])
                        </div>
                        <div class="col-sm">
                            @include('partials.top-5-characters', [
                                                               'title' => 'Most predicted as dead',
                                                               'icon' => 'fas fa-skull-crossbones',
                                                               'background' => 'bg-red',
                                                               'characters' => $dead,
                                                               'statusField' => 'dead_prediction_count',
                                                               'predictionCount' => $totalPredictions
                                                               ])
                        </div>
                        <div class="col-sm">
                            @include('partials.top-5-characters', [
                                                            'title' => 'Most predicted as wight',
                                                            'icon' => 'fas fa-skull',
                                                            'background' => 'bg-blue',
                                                            'characters' => $wight,
                                                            'statusField' => 'wight_prediction_count',
                                                            'predictionCount' => $totalPredictions
                                                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container p-0">
            <div class="card bg-secondary-light mb-4">
                <div class="card-body text-white pl-3 pr-3 pt-3 pb-3">
                    <h2 class="h5 mb-0"><i class="fas fa-chart-bar mr-1"></i> Statistics per character</h2>
                </div>
            </div>
            @foreach($characters->sortByDesc('alive_prediction_count') as $character)
                @php
                    $alivePercentage = ($character['alive_prediction_count'] / $totalPredictions) * 100;
                    $deadPercentage = ($character['dead_prediction_count'] / $totalPredictions) * 100;
                    $wightPercentage = ($character['wight_prediction_count'] / $totalPredictions) * 100;
                @endphp
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-12 col-md-1">
                        <img src="/img/characters/{{ $character->image }}"
                             class="rounded-circle w-100 mr-3 mr-md-0"
                             style="max-height: 40px; max-width: 40px;">
                        <span class="d-inline d-md-none font-weight-bold">
                            {{ $character->name }}
                        </span>
                    </div>
                    <div class="col-0 col-md-2 d-none d-md-block">
                        {{ $character->name }}
                    </div>
                    <div class="col-12 col-md-9" style="text-shadow: 2px 2px 3px rgba(0,0,0,0.3);">
                        <character-bar-charts :x-ticks="{min: 0, max: 100}"
                                              :height="100"
                                              class="d-block d-md-none mt-2"
                                              :prediction-dataset="{{ json_encode([$alivePercentage, $deadPercentage, $wightPercentage]) }}">
                        </character-bar-charts>

                        <div class="progress d-none d-md-flex bg-blue" style="height: 2rem">
                            <div class="progress-bar bg-green" role="progressbar"
                                 style="width: {{ 100- ($deadPercentage + $wightPercentage) }}%;"
                                 aria-valuenow="{{ $alivePercentage }}"
                                 aria-valuemin="0"
                                 aria-valuemax="100">
                                @if($alivePercentage > 5)
                                    <span><i class="fas fa-heartbeat"></i> {{ round($alivePercentage, 2) }}% </span>
                                @endif
                            </div>

                            <div class="progress-bar bg-red" role="progressbar"
                                 style="width: {{ 100- ($alivePercentage + $wightPercentage) }}%;"
                                 aria-valuenow="{{ $deadPercentage }}"
                                 aria-valuemin="0"
                                 aria-valuemax="100">
                                @if($deadPercentage > 5)
                                    <span><i class="fas fa-skull-crossbones"></i> {{ round($deadPercentage, 2) }}% </span>
                                @endif
                            </div>

                            <div class="progress-bar bg-blue" role="progressbar"
                                 style="width: {{ 100- ($alivePercentage + $deadPercentage) }}%;"
                                 aria-valuenow="{{ $wightPercentage }}"
                                 aria-valuemin="0"
                                 aria-valuemax="100">
                                @if($wightPercentage > 5)
                                    <span><i class="fas fa-skull"></i> {{ round($wightPercentage, 2) }}% </span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>

@endsection