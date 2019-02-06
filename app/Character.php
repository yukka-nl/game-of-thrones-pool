<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }
}
