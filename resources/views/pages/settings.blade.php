@extends('layouts.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Settings</li>
        </ol>
    </nav>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h4 mb-2">Settings</h1>
                <hr>
                @auth
                    <settings-form :current-user="{{ json_encode(Auth::user()) }}"></settings-form>
                @endauth
            </div>
        </div>
    </div>
@endsection