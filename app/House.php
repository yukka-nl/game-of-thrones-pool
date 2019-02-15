<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $appends = ['userCount'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getUserCountAttribute()
    {
        return $this->users()->count();
    }
}
