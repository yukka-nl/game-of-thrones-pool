<?php

use Illuminate\Database\Seeder;

class PredictionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\User::all() as $user) {
            foreach (\App\Character::all() as $character) {
                factory(\App\Prediction::class)->create([
                    'user_id' => $user->id,
                    'character_id' => $character->id
                ]);
            }
        }
    }
}
