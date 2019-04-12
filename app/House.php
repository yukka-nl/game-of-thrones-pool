<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $appends = ['amountOfUsers', 'userScore', 'totalScore'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getUserScoreAttribute()
    {
        return $this->average_user_correct_guesses ? $this->average_user_correct_guesses / 100000 : 0;
    }

    public function getTotalScoreAttribute()
    {
        return number_format(($this->userScore + $this->correct_predictions), 2);
    }

    public function getAmountOfUsersAttribute()
    {
        return $this->users()->count();
    }
}
