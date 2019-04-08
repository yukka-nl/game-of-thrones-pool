<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HousePrediction extends Model
{
    protected $fillable = ['user_id', 'status_id', 'character_id', 'house_id'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function character()
    {
        return $this->belongsTo(HouseCharacter::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
