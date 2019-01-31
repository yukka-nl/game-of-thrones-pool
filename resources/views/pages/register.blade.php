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
            <div class="col-sm-12 text-center">
                @isset($inviteCode)
                    <div class="h1 text-center mb-2">
                        <i class="fas fa-envelope-open-text"></i><br>
                    </div>
                    <h1 class="h4 text-center mb-2">
                        You have been invited to {{ $group->name }}
                    </h1>
                    <div class="mb-3">
                        Sign in with Social Media to accept this invite.
                    </div>
                @endisset

                @guest
                    @if(isset($inviteCode))
                        <social-media-buttons redirect-url="invite-link"
                                              invite-code="{{ $inviteCode }}"></social-media-buttons>
                    @else
                        <social-media-buttons></social-media-buttons>
                    @endif
                @endguest
            </div>
        </div>
    </div>
@endsection