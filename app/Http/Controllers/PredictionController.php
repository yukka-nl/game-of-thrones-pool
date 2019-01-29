<?php

namespace App\Http\Controllers;

use App\Character;
use App\Prediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
{

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


    public function create()
    {
        $data['characters'] = Character::all();
        return view('pages.prediction', $data);
    }
}
