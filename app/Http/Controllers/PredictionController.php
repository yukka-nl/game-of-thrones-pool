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
        $data['groupedPredictions'] = $data['user']->allPredictions()->groupBy('status_id');
        return view('pages.user-prediction', $data);
    }

    public function store(Request $request)
    {
        if (config('app.lockdown')) {
            return response("Sorry, season 8 has started. No predictions can be made.", 403);
        }

        if (!Auth::user()->hasPredictions()) {
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
        if (Auth::user()->hasPredictions()) {
            return response("You already made a prediction", 500);
        }

        if (config('app.lockdown')) {
            session()->flash('warning', 'Sorry, season 8 has started. No predictions can be made.');
        }

        $data['characters'] = Character::all();
        return view('pages.prediction', $data);
    }

    public function edit()
    {
        $data['characters'] = Character::all();
        $data['predictions'] = Auth::user()->predictions;
        $data['predictions'] = $data['predictions']->mapWithKeys(function ($item) {
            return [$item['character_id'] => $item['status_id']];
        });
        return view('pages.user-prediction-edit', $data);
    }

    public function update(Request $request)
    {
        if (config('app.lockdown')) {
            return response("Sorry, season 8 has started. No predictions can be made.", 403);
        }

        foreach ($request->all() as $characterId => $status) {
            $prediction = Prediction::where('user_id', Auth::id())->where('character_id', $characterId)->first();
            $prediction->status_id = $status;
            $prediction->save();
        }
        session()->flash('message', 'You have edited your prediction');
        return response('success', 200);
    }
}
