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
                <h1 class="h2 text-center mb-2">Yukka Group</h1>
                <p class="text-center text-muted mb-3">
                    Created 24 hours ago
                </p>

                <div class="row d-flex justify-content-center">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-6 col-sm-4 col-md-2 col-lg-2 col-xl-1 mt-3 text-center">
                            <div>
                                <img src="/img/characters/jon-snow.jpeg" class="rounded-circle w-100 mb-2"
                                      style="max-height: 100px; max-width: 100px;">
                            </div>
                            John Doe
                        </div>
                    @endfor
                </div>
            </div>

        </div>
    </div>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h2">Group leaderboards</h1>
                <p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Correct guesses</th>
                        <th scope="col">Points</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 1; $i < 7; $i++)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>John Doe</td>
                            <td>6</td>
                            <td>100</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
                </p>
            </div>

        </div>
    </div>
@endsection