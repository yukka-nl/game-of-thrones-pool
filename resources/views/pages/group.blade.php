@extends('layouts.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Group</li>
        </ol>
    </nav>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h2 text-center mb-2">{{ $group->name }} Pool</h1>
                <p class="text-center text-muted mb-3">
                    Created 24 hours ago
                </p>

                <div class="text-center">
                    @auth
                        @if($group->owner->id === Auth::id())
                            <invite-link link="{{  URL::to($group->inviteLink()) }}" class="mb-2"></invite-link>
                        @endif
                    @endauth
                </div>
                <div class="row d-flex justify-content-center">
                    @foreach($group->users as $user)
                        <div class="col-6 col-sm-4 col-md-2 col-lg-2 col-xl-1 mt-3 text-center">
                            <div>
                                <img src="{{ $user->avatar }}" class="rounded-circle w-100 mb-2"
                                     style="max-height: 100px; max-width: 100px;">
                            </div>
                            {{ $user->name }}
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h2">Group leaderboards</h1>
                <leaderboard :data="{{ json_encode($leaderboard) }}"></leaderboard>
            </div>

        </div>
    </div>
@endsection