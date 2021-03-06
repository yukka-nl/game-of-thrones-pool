<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseQuestionAnswer extends Model
{
    protected $guarded = ['id'];

    public function houseQuestionOption() {
        return $this->belongsTo(HouseQuestionOption::class);
    }
}
