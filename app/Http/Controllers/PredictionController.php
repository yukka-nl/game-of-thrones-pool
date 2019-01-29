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
        // TODO: Go to personal prediction page
//        $data['prediction'] = Auth::user()->predictions;
//        return view('pages.prediction', $data);
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
