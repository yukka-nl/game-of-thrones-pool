<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HouseQuestion extends Model
{
    protected $with = ['options'];

    public function options()
    {
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

    public function getTopAnswerForHouse($house, $html = false, $array = false)
    {
        $predictions = $this->getPredictionsForHouse($house->id);
        $topPrediction = $predictions->first();

        if (!$topPrediction) {
            return null;
        }

        $status = HouseQuestionOption::findOrFail($topPrediction->house_question_option_id);
        if ($html) {
            return $status->label . ' <br><span class="badge badge-primary">' . round(($topPrediction->total / $house->amountOfUsers) * 100, 2) . '%</span>';
        } elseif ($array) {
            return ['status' => $status->label, 'total' => $topPrediction->total];
        }
        return $status;
    }

    public function getTopAnswerForHouseAsHtml($house)
    {
        return $this->getTopAnswerForHouse($house, true);
    }

    public function getTopAnswerForHouseAsArray($house)
    {
        return $this->getTopAnswerForHouse($house, false, true);
    }

    public function getCorrectAnswers()
    {
        return $this->options->where('is_correct', true);
    }
}
