<?php

use Illuminate\Database\Seeder;

class HouseCharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('house_characters')->insert([
            [
                'name' => 'Drogon',
                'image' => "drogon.jpeg"
            ],
            [
                'name' => 'Rhaegal',
                'image' => "rhaegal.jpeg"
            ],
            [
                'name' => 'Meera Reed',
                'image' => "meera_reed.jpeg"
            ],
            [
                'name' => 'Robin Arryn',
                'image' => "robin_arryn.jpeg"
            ],
            [
                'name' => 'Lyanna Mormont',
                'image' => "lyanna_mormont.jpeg"
            ],
            [
                'name' => 'Yohn Royce',
                'image' => "yohn_royce.jpeg"
            ],
            [
                'name' => 'Edmure Tully',
                'image' => "edmure_tully.jpeg"
            ],
        ]);
    }
}
