<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($platform)
    {
        return Socialite::driver($platform)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param $platform
     * @return void
     */
    public function handleProviderCallback($platform)
    {
        $userData = Socialite::driver($platform)->user();

        $this->getExistingUser($userData, $platform);
    }


    /**
     * Try and get existing user and return it or create new one.
     *
     * @param $userData
     * @param string $platform
     * @return \App\User
     */
    public function getExistingUser($userData, $platform)
    {
        $user = User::where('social_id', $userData->id)->first();

        if (!$user) {
            $user = $this->registerNewUser($userData, $platform);
        }

        return $user;
    }

    /**
     * Register a new user with the data given and return
     *
     * @param $userData
     * @param string $platform
     * @return \App\User
     */
    public function registerNewUser($userData, $platform)
    {
        // create user
        $user = User::create([
            'name' => $userData->name,
            'username' => str_slug($userData->name) . rand(1, 9999999),
            'email' => $userData->email,
            'avatar' => $userData->avatar,
            'password' => bcrypt(str_random(30)),
            'social_id' => $userData->id,
            'platform' => $platform,
            'token' => $userData->token,
            'refresh_token' => $userData->refreshToken
        ]);

        return $user;
    }
}
