

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
                    <div>
                        <a href="/login/facebook" class="btn btn-outline-secondary mt-1 mr-2">
                            <span class="fab fa-facebook brand-color-facebook mr-1"></span> Facebook
                        </a>

                        <a href="/login/reddit" class="btn btn-outline-secondary mt-1 mr-2">
                            <i class="fab fa-reddit brand-color-reddit mr-1"></i> Reddit
                        </a>

                        <a href="/login/twitter" class="btn btn-outline-secondary mt-1 mr-2">
                            <span class="fab fa-twitter brand-color-twitter mr-1"></span> Twitter
                        </a>

                        <a href="/login/google" class="btn btn-outline-secondary mt-1">
                            <i class="fab fa-google brand-color-google mr-1"></i> Google
                        </a>
                    </div>
                @endguest
            </div>

        </div>
    </div>

@endsection