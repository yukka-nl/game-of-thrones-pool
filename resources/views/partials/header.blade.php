<div class="row m-0">
    <div class="col-12 text-center mt-5 mb-4">
        <a href="/">
            <img src="{{ URL::asset('img/header.png') }}" class="header-logo">
        </a>
        @include('partials.user-menu')
    </div>
</div>

{{--<div class="container text-center mb-2">--}}
    {{--<season-countdown deadline="April 15 2019 03:00:00 GMT+0200"></season-countdown>--}}
{{--</div>--}}

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 align-items-end d-none d-md-flex">
            <img src="{{ URL::asset('img/header-topleft.png') }}">
        </div>
        <div class="col-sm-6 col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
            <div class="text-center">
                <season-countdown deadline="April 15 2019 03:00:00 GMT+0200"></season-countdown>
                <div class="small text-center text-muted mt-1 mb-1">
                    Until season 8 starts and the pools are locked.
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 d-flex justify-content-end">
            <img src="{{ URL::asset('img/header-topright.png') }}">
        </div>
    </div>
</div>