<?php

namespace App\Http\Controllers;


use App\Group;
use App\GroupUser;

use App\Http\Requests\GroupStoreRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index()
    {
        $data['groups'] = Auth::user()->groups;
        return view('pages.groups', $data);
    }

    public function show($slug)
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

        $data['leaderboard'] = $usersOrdered;
        return view('pages.group', $data);
    }

    public function create()
    {
        return view('pages.group-form');
    }

    public function store(GroupStoreRequest $request)
    {
        $group = Group::create([
            'name' => $request->name,
            'owner_id' => Auth::id()
        ]);

        Auth::user()->groups()->attach($group->id);
        return response($group, 200);
    }

    public function join($inviteCode)
    {
        $group = Group::where('invite_code', $inviteCode)->first();
        $data['group'] = $group;
        $data['inviteCode'] = $inviteCode;

        // TODO: Don't redirect, but show social login buttons on the group page
        if (!Auth::check()) {
            return view('pages.register', $data)->with('inviteCode', $inviteCode);
        }

        if ($group->hasUser(Auth::id())) {
            return redirect($group->link);
        }

        Auth::user()->groups()->attach($group->id);
        return redirect($group->link)->with('message', 'Joined ' . $group->name . ' group!');
    }
}
