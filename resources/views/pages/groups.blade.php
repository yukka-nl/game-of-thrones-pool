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
                <h1 class="h2 text-center mb-2">Groups</h1>
                <div class="mt-3">
                    <a href="/create-group" class="btn btn-primary">Create a new Group!</a>
                </div>

                <div class="mt-3">
                    <ul>
                        @foreach($groups as $group)
                            <li>
                                <a href="{{ $group->link }}">{{ $group->name }}</a> {{ $group->owner->id == Auth::id() ?  'Owner' : ''  }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection