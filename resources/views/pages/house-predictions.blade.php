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

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-12">
                <h1 class="h4 mb-2 text-center">
                    House Predictions
                </h1>
                <hr>

            </div>

        </div>

        <div class="card bg-blue mb-3 mt-4">
            <div class="card-body text-white pl-3 pr-3 pt-3 pb-3">
                <h1 class="h4 m-0">
                    Complete season
                    {{--<season-countdown deadline="April 15 2019 03:00:00 GMT+0200"--}}
                                      {{--class="mb-3 float-right"></season-countdown>--}}
                </h1>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center">
            <img src="/img/characters/rhaegal.jpeg" class="rounded-circle character-avatar mr-3">
            <img src="/img/characters/drogon.jpeg" class="rounded-circle character-avatar">
        </div>

        <div class="card bg-blue mb-3 mt-4">
            <div class="card-body text-white pl-3 pr-3 pt-3 pb-3">
                <h1 class="h4 m-0">Episode 1</h1>
            </div>
        </div>
        <div class="text-center">
            How many pies will Hot Pie bake this episode?
            <br><br>
            <a class="btn btn-primary" href="#" role="button">Link</a>
            <button class="btn btn-primary" type="submit">Button</button>
            <input class="btn btn-primary" type="button" value="Input">
            <input class="btn btn-primary" type="submit" value="Submit">
            <input class="btn btn-primary" type="reset" value="Reset">
        </div>

        @for ($i = 2; $i < 7; $i++)
            <div class="card bg-grey mb-3 mt-4">
                <div class="card-body text-grey pl-3 pr-3 pt-3 pb-3">
                    <h1 class="h4 m-0">Episode {{ $i }}</h1>
                </div>
            </div>
            <div class="text-center text-muted">
                <div class="h3">
                    <i class="fas fa-lock"></i>
                </div>
                Will be announced on April {{ $i * $i }}th
            </div>
        @endfor
    </div>
@endsection