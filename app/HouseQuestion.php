<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HouseQuestion extends Model
{
    protected $with = ['options'];

    public function options() {
        return $this->hasMany(HouseQuestionOption::class);
    }

    public function getPredictionsForHouse($houseId)
    {
        $result = DB::table('house_question_answers')
            ->select(DB::raw('count(*) as total, house_question_option_id'))
            ->where('house_id', $houseId)
            ->where('house_question_id', $this->id)
            ->groupBy('house_question_option_id')
            ->orderByDesc('total')
            ->get();

        return $result;
    }

    public function getTopPredictionForHouse($house, $html = true)
    {
        $predictions = $this->getPredictionsForHouse($house->id);
        $topPrediction = $predictions->first();

        if(!$topPrediction) {
            return null;
        }

        $status = HouseQuestionOption::findOrFail($topPrediction->house_question_option_id)->label;
        if ($html){
            return $status .' <span class="badge badge-primary">'. round(($topPrediction->total / $house->amountOfUsers) * 100, 2) . '%</span>';
        }
        return ['status' => $status, 'total' => $topPrediction->total];
    }

    public function getTopAnswerForHouse($house) {
        return $this->getTopPredictionForHouse($house, false);
    }
}
