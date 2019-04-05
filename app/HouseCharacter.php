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
}
