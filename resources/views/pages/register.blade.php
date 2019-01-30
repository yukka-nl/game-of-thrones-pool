@extends('layouts.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Groups</li>
        </ol>
    </nav>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h2 text-center mb-2">Register</h1>

                @guest
                    @if(session('inviteCode') !== null)
                        <social-media-buttons redirect-url="invite-link" invite-code="{{ session('inviteCode') }}"></social-media-buttons>
                    @else
                        <social-media-buttons></social-media-buttons>
                    @endif
                @endguest
            </div>
        </div>
    </div>
@endsection