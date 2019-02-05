<?php

namespace App\Http\Controllers;

use App\Character;
use App\Prediction;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $characters = Character::all();
        foreach ($characters as $character) {
            $character->alive = $character->predictions->where('status_id', 1)->count();
            $character->dead = $character->predictions->where('status_id', 2)->count();
            $character->wight = $character->predictions->where('status_id', 3)->count();
        }

        $data['totalPredictions'] = Prediction::all()->groupBy('user_id')->count();
        $data['alive'] = $characters->sortByDesc('alive')->take(5);
        $data['dead'] = $characters->sortByDesc('dead')->take(5);
        $data['wight'] = $characters->sortByDesc('wight')->take(5);
        $data['characters'] = $characters;

        return view('pages.statistics', $data);
    }
}
