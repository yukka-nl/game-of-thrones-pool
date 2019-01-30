<?php

namespace App\Http\Controllers;


use App\Group;
use App\GroupUser;

use App\Http\Requests\GroupStoreRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
        $data['groups'] = Auth::user()->groups;
        return view('pages.groups', $data);
    }

    public function show($groupId)
    {
        $data['group'] = Group::findOrFail($groupId);

        $users = $data['group']->users->sortByDesc('correct_guesses');
        $usersAsArray = array_values($users->toArray());

        for ($i = 0; $i < count($usersAsArray); $i++){
            $usersAsArray[$i]['ranking'] = $i + 1;
        }

        $data['leaderboard'] = $usersAsArray;

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
        // TODO: Don't redirect, but show social login buttons on the group page
        if (!Auth::check()) {
            return redirect('/register')->with('inviteCode', $inviteCode);
        }

        $group = Group::where('invite_code', $inviteCode)->first();
        if ($group->hasUser(Auth::id())) {
            return redirect($group->link);
        }

        Auth::user()->groups()->attach($group->id);
        return redirect($group->link)->with('message', 'Joined ' . $group->name . ' group!');
    }
}
