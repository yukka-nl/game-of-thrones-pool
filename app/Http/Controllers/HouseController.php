<?php

namespace App\Http\Controllers;

use App\House;
use App\HouseCharacter;
use App\HousePrediction;
use App\HouseQuestion;
use App\HouseQuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HouseController extends Controller
{
    public function index()
    {
        return House::withCount('users')->orderBy('users_count', 'desc')->get();
    }

    public function join(Request $request)
    {
        $user = Auth::user();
        $user->house_id = $request->houseId;
        $user->save();

        if ($request->flashMessage == 'true') {
            session()->flash('message', 'You have joined ' . $user->house->name . '!');
        }
        return $user->house_id;
    }

    public function predictions()
    {
        $user = Auth::user();
        if ($user->hasHousePredictions()) {
            return redirect()->action('HouseController@predictionResults');
        }
        $data['houseCharacters'] = HouseCharacter::all();
        $data['houseQuestions'] = HouseQuestion::all();
        $house = House::findOrFail($user->house_id);

        foreach ($data['houseCharacters'] as $houseCharacter) {
            $houseCharacter['predictions'] = $houseCharacter->getPredictionsForHouse($house->id);
        }

        return view('pages.house-predictions', $data);
    }

    public function storePrediction(Request $request)
    {
        if (!Auth::user()->hasHousePredictions()) {
            foreach ($request->all() as $characterId => $value) {
                if (Str::startsWith($characterId, 'c')) {
                    HousePrediction::create([
                        'status_id' => $value,
                        'character_id' => Str::after($characterId, 'c'),
                        'user_id' => Auth::id(),
                        'house_id' => Auth::user()->house_id
                    ]);
                } else {
                    HouseQuestionAnswer::create([
                        'house_question_id' => Str::after($characterId, 'q'),
                        'house_question_option_id' => $value,
                        'user_id' => Auth::id(),
                        'house_id' => Auth::user()->house_id
                    ]);
                }

            }
        } else {
            return response("You already made a prediction", 500);
        }
    }

    public function predictionResults()
    {
        $data['characters'] = HouseCharacter::all();
        $data['houses'] = House::all();
        return view('pages.house-predictions-result', $data);
    }
}
