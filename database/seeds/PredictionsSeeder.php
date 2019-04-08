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

            if ($user->house){
                DB::table('house_predictions')->insert([
                    ['status_id' => rand(1,3), 'character_id' => 1, 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['status_id' => rand(1,3), 'character_id' => 2, 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['status_id' => rand(1,3), 'character_id' => 3, 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['status_id' => rand(1,3), 'character_id' => 4, 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['status_id' => rand(1,3), 'character_id' => 5, 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['status_id' => rand(1,3), 'character_id' => 6, 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['status_id' => rand(1,3), 'character_id' => 7, 'user_id' => $user->id, 'house_id' => $user->house_id],
                ]);
                DB::table('house_question_answers')->insert([
                    ['house_question_id' => 1, 'house_question_option_id' => rand(1, 2), 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['house_question_id' => 2, 'house_question_option_id' => rand(3, 5), 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['house_question_id' => 3, 'house_question_option_id' => rand(6, 9), 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['house_question_id' => 4, 'house_question_option_id' => rand(10, 13), 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['house_question_id' => 5, 'house_question_option_id' => rand(14, 15), 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['house_question_id' => 6, 'house_question_option_id' => rand(16, 17), 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['house_question_id' => 7, 'house_question_option_id' => rand(18, 19), 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['house_question_id' => 8, 'house_question_option_id' => rand(20, 21), 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['house_question_id' => 9, 'house_question_option_id' => rand(22, 61), 'user_id' => $user->id, 'house_id' => $user->house_id],
                    ['house_question_id' => 10, 'house_question_option_id' => rand(62, 101), 'user_id' => $user->id, 'house_id' => $user->house_id],
                ]);
            }
        }
    }
}
