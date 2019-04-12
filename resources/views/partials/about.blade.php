<div class="container card mb-3 card p-4">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <h1 class="h2">Winter has arrived: it's death pool time.</h1>
            <p>
                Season 8 of Game of Thrones will start soon. Not all your beloved characters
                will survive the threat of the white walkers. Create a pool with your friends to predict the fate
                of all remaining characters. Beat your friends by earning the most points or compete in the global
                leaderboards.
            </p>

            <p>
                We are working on some exciting new features, such as global statistics based on all submitted
                predictions. Follow us on <a target="_blank" rel="noopener"
                                             href="https://twitter.com/yukkasoftware">Twitter</a> or <a
                        target="_blank" rel="noopener"
                        href="https://www.facebook.com/YukkaSoftwareSolutions">Facebook</a>
                to stay up-to-date!

            </p>
        </div>
        <div class="col-sm-12 col-md-6 d-flex justify-content-center align-items-center">
            <div class="text-center">
                @if(!config('app.lockdown'))
                    <make-prediction-button is-authenticated="{{ Auth::check() }}"
                                            made-predictions="{{ Auth::check() && Auth::user()->hasPredictions() }}"
                                            user-id="{{ Auth::id() }}">
                    </make-prediction-button>
                    @if(Auth::check() && Auth::user()->hasPredictions())
                        <div class="mt-2">
                            <a href="/prediction/edit"><i class="fas fa-pencil-alt"></i> Edit your prediction</a>
                        </div>
                    @endif
                    @guest
                        <div class="mt-3 mb-1">
                            Already made a prediction? Sign into see your groups!
                        </div>
                        @include('partials.social-login-buttons')
                    @endguest
                @else
                    @if(Auth::check())
                        <div class="mt-2">
                            <a href="{{'/prediction/user/' . Auth::id()}}" class="btn btn-outline-secondary btn-lg"><i class="fab fa-wpforms mr-1"></i> View your prediction
                            </a>
                        </div>
                    @endif
                    @guest
                        Sorry, Season 8 started. Registration and predictions are closed.
                            <div class="mt-3 mb-1">
                                Already made a prediction? Sign into see your predictions!
                            </div>
                            @include('partials.social-login-buttons')
                    @endguest
                @endif

            </div>
        </div>
    </div>
</div>