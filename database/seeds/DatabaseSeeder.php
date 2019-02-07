<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CharactersTableSeeder::class);
         $this->call(StatusTableSeeder::class);
        $this->call(FakeUserTablesSeeder::class);
        $this->call(PredictionsSeeder::class);
    }
}
