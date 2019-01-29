<?php

namespace App\Http\Controllers;

use App\Character;
use App\Prediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data['characters'] = Character::all();
        return view('pages.prediction', $data);
    }

    public function show()
    {
        $data['prediction'] = Auth::user()->prediction;
        return view('pages.prediction', $data);
    }

    public function store(Request $request)
    {
        Prediction::create($request->input());
        return view('/');
    }
}
