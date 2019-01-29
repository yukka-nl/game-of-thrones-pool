<div class="row">
    <div class="col-12 text-center mt-5 mb-4">
        <a href="/">
            <img src="{{ URL::asset('img/header.png') }}" style="height: 40px;">
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