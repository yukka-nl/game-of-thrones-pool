<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    const DEFAULT_AVATAR_PATH = '/img/default-avatar.png';

    use Notifiable;

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->append('has_predictions');
        $this->append('link');
    }

    public function getLinkAttribute()
    {

        return '/prediction/user/' . $this->id;
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function housePredictions()
    {
        return $this->hasMany(HousePrediction::class);
    }

    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }

    public function allPredictions() {
        return $this->predictions->merge($this->housePredictions);
    }

    public function getHasPredictionsAttribute()
    {
        return $this->hasPredictions();
    }

    public function hasPredictions()
    {
        return $this->predictions->count() > 0;
    }

    public function hasHousePredictions()
    {
        return $this->housePredictions()->count() > 0;
    }

    public function characterPrediction($characterId)
    {
        if ($this->hasPredictions()) {
            return $this->predictions->where('character_id', $characterId)->first()->status;
        }
    }

    /**
     * @return string
     */
    public function getAvatarAttribute(): string
    {

        if (is_null($this->attributes['avatar']) || !$this->show_social_avatar) {
            return self::DEFAULT_AVATAR_PATH;
        }

        return str_replace('http://', 'https://', $this->attributes['avatar']);

    }
}
