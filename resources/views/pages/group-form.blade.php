@extends('layouts.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/groups">Groups</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1 class="h4 mb-2">Create Group</h1>

                @auth
                    <create-group-form></create-group-form>
                @endauth
            </div>

        </div>
    </div>
@endsection