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

        // TODO: Order by correct guesses when S8 airs
//        $usersOrdered = DB::table('users')
//            ->orderBy('correct_guesses', 'desc')
//            ->get();

        $usersOrderedWithHouse = DB::table('users')
            ->whereNotNull('house_id')
            ->select(['avatar', 'correct_guesses', 'name', 'house_id', 'show_social_avatar', 'id'])
            ->orderBy('created_at', 'desc')
            ->get();

        $usersOrderedWithoutHouse = DB::table('users')
            ->whereNull('house_id')
            ->select(['avatar', 'correct_guesses', 'name', 'house_id', 'show_social_avatar', 'id'])
            ->orderBy('created_at', 'desc')
            ->get();

        $usersOrdered = $usersOrderedWithHouse->merge($usersOrderedWithoutHouse);

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
