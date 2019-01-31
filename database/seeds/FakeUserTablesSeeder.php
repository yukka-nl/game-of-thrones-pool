<?php

class FakeUserTablesSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 200; $i++) {
            \App\User::create([
                'name' => str_random(10),
                'email' => str_random(4) . '@' . str_random(5) . '.net',
                'password' => bcrypt('password'),
                'social_id' => str_random(15),
                'platform' => 'yukka',
                'token' => str_random(30)
            ]);
        }
    }
}
