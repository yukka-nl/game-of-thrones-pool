<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetLeaderboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $usersGrouped = DB::table('users')
            ->select('correct_guesses', DB::raw('count(*) as total'))
            ->groupBy('correct_guesses')
            ->orderBy('correct_guesses', 'desc')
            ->get();

        $usersOrdered = DB::table('users')
            ->select(['avatar', 'correct_guesses', 'name', 'house_id', 'show_social_avatar', 'id'])
            ->orderBy('correct_guesses', 'desc')
            ->get();

        foreach ($usersOrdered as $user) {
            foreach ($usersGrouped as $index=>$group){
                if ($user->correct_guesses == $group->correct_guesses) {
                    $user->ranking = $index + 1;
                }
            }
        }
        return response($usersOrdered->toJson(), 200);
    }
}
