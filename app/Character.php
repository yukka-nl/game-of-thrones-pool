<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ['alive_prediction_count', 'dead_prediction_count', 'wight_prediction_count'];

    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }
}
