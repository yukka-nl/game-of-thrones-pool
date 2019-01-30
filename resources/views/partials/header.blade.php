<div class="row m-0">
    <div class="col-12 text-center mt-5 mb-4">
        <a href="/">
            <img src="{{ URL::asset('img/header.png') }}" class="header-logo">
        </a>
        @include('partials.user-menu')
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6 align-items-end d-none d-md-flex">
            <img src="{{ URL::asset('img/header-topleft.png') }}">
        </div>
        <div class="col-sm-6 d-flex justify-content-end">
            <img src="{{ URL::asset('img/header-topright.png') }}">
        </div>
    </div>
</div>