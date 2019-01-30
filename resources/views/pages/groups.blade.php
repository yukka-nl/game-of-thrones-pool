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
                    <a href="/create-group" class="btn btn-success"><i class="fas fa-plus mr-1"></i> Create a new Group</a>
                </div>

                <table class="table mt-3 table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Group name</th>
                        <th scope="col">Members</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>
                                <a href="{{ $group->link }}">
                                    {{ $group->name }}
                                </a>
                                @if($group->owner->id == Auth::id())
                                    <span class="badge badge-primary ml-1">You own this group</span>
                                @endif
                            </td>
                            <td>{{ $group->users->count() }}</td>
                            <td>
                                <a href="{{ $group->link }}">
                                    Go to page
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection