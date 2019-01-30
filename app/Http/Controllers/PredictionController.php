<?php

namespace App\Http\Controllers;

use App\Character;
use App\Prediction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
{

    public function show($userId)
    {
        $data['user'] = User::findOrFail($userId);
        $data['groupedPredictions'] = $data['user']->predictions->groupBy('status_id');
        return view('pages.user-prediction', $data);
    }

    public function store(Request $request)
    {
        if(!Auth::user()->hasPredictions()) {
            foreach ($request->all() as $characterId => $status) {
                Prediction::create([
                    'status_id' => $status,
                    'character_id' => $characterId,
                    'user_id' => Auth::id()
                ]);
            }
        } else {
            return response("You already made a prediction", 500);
        }
    }

    public function create()
    {
        if(Auth::user()->hasPredictions()) {
            return response("You already made a prediction", 500);
        }
        $data['characters'] = Character::all();
        return view('pages.prediction', $data);
    }
}
