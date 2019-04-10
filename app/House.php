<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $appends = ['amountOfUsers'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getAmountOfUsersAttribute()
    {
        return $this->users()->count();
    }
}
