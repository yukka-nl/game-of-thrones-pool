<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class HouseCharacter extends Model
{
    public function getPredictionsForHouse($houseId)
    {
        $result = DB::table('house_predictions')
            ->select(DB::raw('count(*) as total, status_id'))
            ->where('house_id', $houseId)
            ->where('character_id', $this->id)
            ->groupBy('status_id')
            ->orderByDesc('total')
            ->get();

        return $result;
    }

    public function getTopPredictionForHouse($house)
    {
        $predictions = $this->getPredictionsForHouse($house->id);
        $topPrediction = $predictions->first();
        $returnValue = $house;
        if(!$topPrediction) {
            $returnValue->predictionStatus = 0;
        } else {
            $status = Status::findOrFail($topPrediction->status_id)->status;
            $returnValue->predictionStatus = $status;
            $returnValue->predictionPercentage = round(($topPrediction->total / $house->amountOfUsers) * 100, 2);
        }
        return $returnValue;
    }
}
