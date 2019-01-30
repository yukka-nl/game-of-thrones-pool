@auth
    <div class="mt-5">
        <div>
            <img src="{{ Auth::user()->avatar }}" class="rounded-circle mr-2" style="height: 50px">
            Logged in as <strong>{{ Auth::user()->name }}</strong> <span class="text-muted">(0 points)</span>
            <br>
        </div>
        <div class="mt-3">
            <a href="/groups" class="btn btn-primary mt-1">
                Groups <span class="ml-1 badge badge-light">{{Auth::user()->groups->count()}}</span>
            </a>

            <a href="#" class="btn btn-primary mt-1">
                Your prediction
            </a>

            <a href="/settings" class="btn btn-primary mt-1">
                Settings
            </a>

            <a href="/logout" class="btn btn-primary mt-1">
                Sign out
            </a>
        </div>
    </div>
@endauth