<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function show()
    {
        return view('pages.settings');
    }

    public function update(Request $request)
    {
        dd('beep');
    }
}
