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
                @include('partials.rules')
            </div>
            <div class="col-sm-12">
                @if(!config('app.lockdown'))
                    <prediction-form :characters="{{ $characters }}" username="{{ Auth::user()->name }}"
                                     user-id="{{ Auth::id() }}"></prediction-form>
                @else
                    <div class="alert alert-danger" role="alert">
                        Sorry, season 8 has started. No predictions can be made.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection