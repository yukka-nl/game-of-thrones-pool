<?php

use Illuminate\Database\Seeder;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('houses')->insert([
            [
                'name' => 'Baratheon',
                'image' => 'baratheon.svg',
            ],
            [
                'name' => 'Arryn',
                'image' => 'arryn.svg',
            ],
            [
                'name' => 'Greyjoy',
                'image' => 'greyjoy.svg',
            ],
            [
                'name' => 'Lannister',
                'image' => 'lannister.svg',
            ],
            [
                'name' => 'Martell',
                'image' => 'martell.svg',
            ],
            [
                'name' => 'Stark',
                'image' => 'stark.svg',
            ],
            [
                'name' => 'Targaryen',
                'image' => 'targaryen.svg',
            ],
            [
                'name' => 'Tully',
                'image' => 'tully.svg',
            ],
            [
                'name' => 'Tyrell',
                'image' => 'tyrell.svg',
            ],
            [
                'name' => 'Freefolk',
                'image' => 'freefolk.svg',
            ],
        ]);
    }
}
