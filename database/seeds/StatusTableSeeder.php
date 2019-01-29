<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('statuses')->insert([
            [
                'status' => 'Alive'
            ],
            [
                'status' => 'Dead'
            ],
            [
                'status' => 'Wight'
            ],
        ]);
    }
}
