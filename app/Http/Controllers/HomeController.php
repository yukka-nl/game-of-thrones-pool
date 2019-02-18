<?php

namespace App\Http\Controllers;

use App\House;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // TODO: Use ranking feature after S8 airs.
//        $data = $this->getUsersWithRanking();
        $data = $this->getUsersPreRelease();
        return view('pages.home', $data);
    }

    public function getUsersWithRanking()
    {
        $usersGrouped = DB::table('users')
            ->select('correct_guesses', DB::raw('count(*) as total'))
            ->groupBy('correct_guesses')
            ->orderBy('correct_guesses', 'desc')
            ->get();

        $usersOrdered = DB::table('users')
            ->orderBy('correct_guesses', 'desc')
            ->get();

        foreach ($usersOrdered as $user) {
            foreach ($usersGrouped as $index=>$group){
                if ($user->correct_guesses == $group->correct_guesses) {
                    $user->ranking = $index + 1;
                }
            }
        }

        $data['leaderboard'] = $usersOrdered;
        $data['userCount'] = User::count();
        return $data;
    }

    public function getUsersPreRelease()
    {
        $data['leaderboard'] = User::orderBy('house_id', 'desc')->get();
        $data['userCount'] = $data['leaderboard']->count();
        return $data;
    }
}
