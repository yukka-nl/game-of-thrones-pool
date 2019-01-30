<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $users = User::get()->sortByDesc('correct_guesses');
        $usersAsArray = array_values($users->toArray());

        for ($i = 0; $i < count($usersAsArray); $i++){
            $usersAsArray[$i]['ranking'] = $i + 1;
        }

        $data['leaderboard'] = $usersAsArray;
        return view('pages.home', $data);
    }
}
