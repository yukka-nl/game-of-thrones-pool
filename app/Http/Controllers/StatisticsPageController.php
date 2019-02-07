<?php

namespace App\Http\Controllers;

use App\Character;
use App\Statistic;
use Illuminate\Http\Request;

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
        $data['totalPredictions'] = Statistic::where('key', 'total_predictions')->first()->value;
        $data['characters'] = Character::all();
        $data['alive'] = Character::all()->sortByDesc('alive_prediction_count')->take(5);
        $data['dead'] = Character::all()->sortByDesc('dead_prediction_count')->take(5);
        $data['wight'] = Character::all()->sortByDesc('wight_prediction_count')->take(5);
        return view('pages.statistics', $data);
    }
}
