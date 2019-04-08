<?php

namespace App\Http\Controllers;

use App\House;
use App\HouseCharacter;
use App\HousePrediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check()) {
            $user = Auth::user();
            if ($user->hasHousePredictions()) {
                return redirect()->action('HouseController@predictionResults');
            }

            if($user->house_id) {
                $data['houseCharacters'] = HouseCharacter::all();
                $house = House::findOrFail($user->house_id);

                foreach ($data['houseCharacters'] as $houseCharacter) {
                    $houseCharacter['predictions'] = $houseCharacter->getPredictionsForHouse($house->id);
                }
            }
        }
        return view('pages.house-predictions', $data ?? []);
    }

    public function storePrediction(Request $request)
    {
        if (!Auth::user()->hasHousePredictions()) {
            foreach ($request->all() as $characterId => $status) {
                HousePrediction::create([
                    'status_id' => $status,
                    'character_id' => $characterId,
                    'user_id' => Auth::id(),
                    'house_id' => Auth::user()->house_id
                ]);
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
