<?php

namespace App\Http\Controllers;


use App\Group;
use App\GroupUser;

use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function show($name)
    {
        $data['group'] = Group::where('name', $name)->first();
        return view('pages.group');
    }

    public function create()
    {
        return view('pages.group-form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:groups|max:255',
            'owner_id' => 'required|integer|exists:users,id',
        ]);

        $group = Group::create($validatedData);
        return redirect('/group/' . $group->name);
    }

    public function join($inviteCode)
    {
        $group = Group::where('uuid', $inviteCode)->first();
        GroupUser::create([
            'user_id' => Auth::id(),
            'group_id' => $group->id,
        ]);
        return redirect('/group/' . $group->name);
    }
}
