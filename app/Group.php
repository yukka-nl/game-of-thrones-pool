<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Group extends Model
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = str_slug($model->name);
            $model->invite_code = Uuid::uuid4()->toString();
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function predictions() {
        $predictions = collect();
        foreach ($this->users as $user) {
            $predictions->push($user->prediction);
        }
        return $predictions;
    }

    public function hasUser($id) {
        return $this->users->contains('id', $id);
    }
}
