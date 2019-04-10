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
        for ($i = 1; $i <= 20000; $i++) {
            factory(\App\User::class)->create();
        }
    }
}
