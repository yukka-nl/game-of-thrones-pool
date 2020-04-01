@extends('layouts.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Group</li>
        </ol>
    </nav>

    @auth
        @if($group->owner->id === Auth::id())
            <div class="text-center container card  mt-3 mb-3 card p-4">
                <invite-link link="{{  URL::to($group->inviteLink()) }}" class="mb-2"></invite-link>
            </div>
        @endif
    @endauth

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center d-flex align-items-center justify-content-center">
                    <h1 class="h2">Pool: {{ $group->name }}</h1>
                </div>

                <div class="text-center text-muted mb-2">

                    @if($group->slug == '0c56572a-6f29-4009-a658-b66b6b6cd848')
                        <p><img src="/img/fok.gif" alt="FOK!forum"></p>
                    @endif
                    
                    Created {{ $group->created_at->diffForHumans() }} <br>
                </div>

                @if($group->owner->id !== Auth::id() && $group->hasUser(Auth::id()) )
                    <group-options-dropdown :group="{{ json_encode($group) }}"
                                            :is-owner="{{ json_encode($group->owner->id === Auth::id()) }}">
                    </group-options-dropdown>
                @endif

                <div class="row d-flex justify-content-center">
                    @if($group->users->count() <= 24)
                        @foreach($group->users as $user)
                            <div class="col-6 col-sm-4 col-md-2 col-lg-2 mt-3 text-center">
                                <div>
                                    <img src="{{ $user->avatar }}" class="rounded-circle w-100 mb-2"
                                         style="max-height: 100px; max-width: 100px;">
                                </div>
                                {{ $user->name }}
                            </div>
                        @endforeach
                    @else
                        This group has {{ $group->users->count() }} participating users.
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h2">Group leaderboards</h1>
                <group-leaderboard slug="{{ $group->slug }}"></group-leaderboard>
            </div>

        </div>
    </div>
@endsection