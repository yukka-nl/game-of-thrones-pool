<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data['characters'] = Character::all();
        return view('pages.prediction', $data);
    }
}
