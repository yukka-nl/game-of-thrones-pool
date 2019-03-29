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
        for ($i = 0; $i <= 10000; $i++) {
            factory(\App\User::class)->create();
        }
    }
}
