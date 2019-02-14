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
        if($request->has('username')) {
            $user->name = $request->input('username');

        }
        $user->show_social_avatar = $request->input('showSocialAvatar');
        $user->save();
        return response($user, 200);
    }

    public function delete()
    {
        $user = Auth::user();
        auth()->logout();
        $user->delete();
        return response('Account deleted.', 200);
    }
}
