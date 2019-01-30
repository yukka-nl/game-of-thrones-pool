<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $data = User::get();

        return response(array_values($data->sortByDesc('correct_guesses')->toArray()), 200);
    }
}
