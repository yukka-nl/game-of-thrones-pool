<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $fillable = ['user_id', 'status_id', 'character_id'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
