<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class PredictionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            DB::table('predictions')->insert([
                ['status_id' => rand(1,3), 'character_id' => 1, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 2, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 3, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 4, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 5, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 6, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 7, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 8, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 9, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 10, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 11, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 12, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 13, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 14, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 15, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 16, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 17, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 18, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 19, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 20, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 21, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 22, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 23, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 24, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 25, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 26, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 27, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 28, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 29, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 30, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 31, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 32, 'user_id' => $user->id],
                ['status_id' => rand(1,3), 'character_id' => 33, 'user_id' => $user->id],
            ]);

            DB::table('house_predictions')->insert([
                ['status_id' => rand(1,3), 'character_id' => 1, 'user_id' => $user->id, 'house_id' => $user->house_id],
                ['status_id' => rand(1,3), 'character_id' => 2, 'user_id' => $user->id, 'house_id' => $user->house_id],
                ['status_id' => rand(1,3), 'character_id' => 3, 'user_id' => $user->id, 'house_id' => $user->house_id],
                ['status_id' => rand(1,3), 'character_id' => 4, 'user_id' => $user->id, 'house_id' => $user->house_id],
                ['status_id' => rand(1,3), 'character_id' => 5, 'user_id' => $user->id, 'house_id' => $user->house_id],
                ['status_id' => rand(1,3), 'character_id' => 6, 'user_id' => $user->id, 'house_id' => $user->house_id],
                ['status_id' => rand(1,3), 'character_id' => 7, 'user_id' => $user->id, 'house_id' => $user->house_id],
            ]);
        }
    }
}
