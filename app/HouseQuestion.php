<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseQuestion extends Model
{
    protected $with = ['options'];

    public function options() {
        return $this->hasMany(HouseQuestionOption::class);
    }
}
