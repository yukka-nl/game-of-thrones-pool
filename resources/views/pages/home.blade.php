@extends('layouts.master')

@section('content')
    <div class="container card mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1 class="h2">Welcome</h1>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id rutrum tortor. Sed volutpat justo
                    eu libero malesuada, scelerisque sodales turpis aliquam. Aenean vulputate diam a quam egestas
                    elementum. Morbi at elementum lectus. Quisque diam tortor, tincidunt quis sodales et, cursus vel
                    nisl.
                </p>
            </div>
            <div class="col-sm-12 col-md-6 d-flex justify-content-center align-items-center">
                <a href="/prediction" class="btn btn-primary btn-lg">
                    Make your prediction
                </a>
            </div>
        </div>
    </div>

    <div class="container card  mt-3 mb-3 card p-4">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h2">Global leaderboards</h1>
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
                    @for ($i = 1; $i < 10; $i++)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>Mark</td>
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