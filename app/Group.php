<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function predictions() {
        $predictions = collect();
        foreach ($this->users as $user) {
            $predictions->push($user->prediction);
        }
        return $predictions;
    }
}
