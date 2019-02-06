<?php

use Faker\Generator as Faker;

$factory->define(\App\Prediction::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'status_id' => $faker->numberBetween(1,3),
        'character_id' => 1
    ];
});
