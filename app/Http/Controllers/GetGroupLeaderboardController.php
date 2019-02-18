<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Support\Facades\DB;

class GetGroupLeaderboardController extends Controller
{
    public function __invoke($slug)
    {
        $data['group'] = Group::where('slug', $slug)->get()->first();
        $usersGrouped = DB::table('users')
            ->join('group_user', 'users.id', '=', 'group_user.user_id')
            ->select('correct_guesses', DB::raw('count(*) as total'))
            ->where('group_user.group_id', $data['group']->id)
            ->groupBy('correct_guesses')
            ->orderBy('correct_guesses', 'desc')
            ->get();

        $usersOrdered = DB::table('users')
            ->join('group_user', 'users.id', '=', 'group_user.user_id')
            ->where('group_user.group_id', $data['group']->id)
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
