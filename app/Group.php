<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Group extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['link'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = Uuid::uuid4()->toString();
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

    public function getLinkAttribute()
    {
        return '/groups/' . $this->slug;
    }

    public function inviteLink() {
        return '/groups/invite/' . $this->invite_code;
    }
}
