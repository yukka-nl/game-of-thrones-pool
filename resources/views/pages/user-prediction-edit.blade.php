@extends('layouts.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Prediction</li>
        </ol>
    </nav>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                @include('partials.rules')
            </div>
            <div class="col-sm-12">
                @if(!config('app.lockdown'))
                    <prediction-edit-form :characters="{{ $characters }}"
                                          username="{{ Auth::user()->name }}"
                                          user-id="{{ Auth::id() }}"
                                          :predictions="{{ json_encode($predictions) }}">
                    </prediction-edit-form>
                @else
                    <div class="alert alert-danger" role="alert">
                        Sorry, the website is in lockdown. No predictions can be made.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection