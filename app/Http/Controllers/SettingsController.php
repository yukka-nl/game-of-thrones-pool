<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingUpdateRequest;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function show()
    {
        return view('pages.settings');
    }

    public function update(SettingUpdateRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->input('username');
        $user->save();
        return response($user, 200);
    }
}
