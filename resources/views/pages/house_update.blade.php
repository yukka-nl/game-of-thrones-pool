@extends('layouts.master')

@section('meta-images')
    <meta property="og:image" content="{{ URL::asset('img/both-update.png') }}"/>
    <meta property="og:image:secure_url" content="{{ URL::asset('img/both-update.png') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Groups</li>
        </ol>
    </nav>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="h4 mb-2">Battle of the Houses update (February 15th)</h1>
                <hr>

                <p>
                    We just launched another update to Pool of Dragons, called 'Battle of the Houses'. First off, we
                    made a number of improvements to our website:
                </p>

                <ul>
                    <li>Added option to edit your prediction</li>
                    <li>Added option to leave a group</li>
                    <li>Added option to hide your profile photo</li>
                    <li>Added 'Battle of the Houses' component</li>
                </ul>

                <p>
                    Battles of the Houses also gives you the chance to fight for your favourite house. There are two
                    ways a house can earn points:
                </p>
                <p class="text-left">
                    <strong><i class="fas fa-clipboard-list"></i> Collective house predictions</strong>
                    <br>
                    Once you join a house your prediction will be added to the collective
                    house predictions. The percentage of correct guesses will partially determine the ranking of a
                    house.
                </p>

                <p class="text-left">
                    <strong><i class="fas fa-poll"></i> Collective episode-based predictions</strong>
                    <br>
                    The second way to earn points is to participate in the episode-based predictions. Before each
                    episode
                    airs, an extra prediction question will be added to the pool. Each house member gets the chance to
                    vote
                    for the predicted outcome. The option that has the most votes among the house members will be the
                    collective choice of the house. Correct predictions will earn points for the house.
                </p>
            </div>
        </div>
    </div>

    <div class="container card  mt-3 mb-3 card p-4 text-center">
        <div class="d-flex align-items-center justify-content-center">
            <div>
                <h1 class="h2 d-inline mr-2">Battle of the Houses</h1>
                <span class="badge badge-success h4 d-inline" style="font-size:0.9rem">new</span>
            </div>
        </div>
        <div class="container p-0">
            <houses-leaderboard :lockdown="{{ json_encode(config('app.lockdown')) }}"
                    :user-logged-in="{{ json_encode(Auth::check()) }}"
                    :user-house-id="{{ json_encode(Auth::check() ? Auth::user()->house_id : null ) }}">
            </houses-leaderboard>
        </div>
    </div>

    @include('partials.about')

@endsection