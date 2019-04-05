<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class House extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
