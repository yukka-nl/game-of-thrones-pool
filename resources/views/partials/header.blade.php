<div class="row m-0">
    <div class="col-12 text-center mt-5 mb-4">
        <a href="/">
            <img src="{{ URL::asset('img/header.png') }}" class="header-logo">
        </a>
        @include('partials.user-menu')
    </div>
</div>

<div class="container mt-2">
    <div class="row">
        <div class="col-sm-6 col-md-4 align-items-end d-none d-md-flex">
            <img src="{{ URL::asset('img/header-topleft.png') }}">
        </div>
        <div class="col-sm-6 col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
            <div class="text-center">
                <div class="small text-center text-muted mb-1">
                    Predictions can be made until season 8 starts...
                </div>
                <season-countdown deadline="April 15 2019 03:00:00 GMT+0200" class="mb-3"></season-countdown>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 d-flex justify-content-end align-items-end">
            <img src="{{ URL::asset('img/header-topright.png') }}" style="max-height: 100%;">
        </div>
    </div>
</div>