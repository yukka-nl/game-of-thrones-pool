<?php

namespace App\Http\Controllers;


use App\Group;
use App\GroupUser;

use App\User;
use Illuminate\Http\Request;
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
        return view('pages.group', $data);
    }

    public function create()
    {
        return view('pages.group-form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:groups|max:255',
        ]);

        $group = Group::create([
            'name' => $request->name,
            'owner_id' => Auth::id()
        ]);

        Auth::user()->groups()->attach($group->id);

        return response($group);
    }

    public function join($inviteCode)
    {
        if (!Auth::check()) {
            return redirect('/register');
        }

        $group = Group::where('invite_code', $inviteCode)->first();

        if ($group->hasUser(Auth::id())) {
            return redirect('/groups/' . $group->id);
        }

        Auth::user()->groups()->attach($group->id);

        return redirect('/groups/' . $group->id)->with('message', 'Joined ' . $group->name . ' group!');
    }
}
