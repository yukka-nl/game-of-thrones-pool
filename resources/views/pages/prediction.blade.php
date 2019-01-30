@extends('layouts.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Make prediction</li>
        </ol>
    </nav>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h4">Rules</h1>
                <ul>
                    <li>
                        All predictions are based on the <strong>end of the season</strong> and the results will be
                        updated after each episode.
                    </li>
                    <li>
                        <strong>Alive:</strong> the character is still alive at the end of the season.
                    </li>
                    <li>
                        <strong>Dead:</strong> for example, a character is blown up by wildfire.
                    </li>
                    <li>
                        <strong>Dead, becomes a wight:</strong> means the character dies and is resurrected as a wight.
                    </li>
                    <li>
                        <strong>Please note:</strong> any character that becomes a wight and is destroyed afterwards is
                        still considered as *Dead, becomes a Wight*
                    </li>
                    <li>
                        Points are being rewarded as the show goes on. Points for correct 'Alive' predictions will only
                        be rewarded at the end of the show.
                    </li>
                    <li>
                        All characters that have been resurrected previously, for example Jon Snow and The Mountain, are
                        considered to be alive at the beginning of the season.
                    </li>
                </ul>
            </div>
            <div class="col-sm-12">
                <prediction-form :characters="{{ $characters }}" username="{{ Auth::user()->name }}"
                                 user-id="{{ Auth::id() }}"></prediction-form>
            </div>
        </div>
    </div>
@endsection