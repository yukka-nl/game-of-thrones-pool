<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data['leaderboard'] =  array_values(User::get()->sortByDesc('correct_guesses')->toArray());
        return view('pages.home', $data);
    }
}
