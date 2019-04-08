<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseQuestion extends Model
{
    public function options() {
        return $this->hasMany(HouseQuestionOption::class);
    }
}
