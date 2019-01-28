<?php

use Illuminate\Database\Seeder;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert([
            [
                'name' => 'Jon Snow',
                'image' => "jon-snow.jpeg"
            ],
            [
                'name' => 'Sansa Stark',
                'image' => "sansa-stark.jpeg"
            ],
            [
                'name' => 'Arya Stark',
                'image' => "arya-stark.jpeg"
            ],
            [
                'name' => 'Bran Stark',
                'image' => "bran-stark.jpeg"
            ],
            [
                'name' => 'Cersei Lannister',
                'image' => "cersei-lannister.jpeg"
            ],
            [
                'name' => 'Jaime Lannister',
                'image' => "jaime-lannister.jpeg"
            ],
            [
                'name' => 'Tyrion Lannister',
                'image' => "tyrion-lannister.jpeg"
            ],
            [
                'name' => 'Daenerys Targaryen',
                'image' => "daenerys-targaryen.jpeg"
            ],
            [
                'name' => 'Yara Greyjoy',
                'image' => "yara-greyjoy.jpeg"
            ],
            [
                'name' => 'Theon Greyjoy',
                'image' => "theon-greyjoy.jpeg"
            ],
            [
                'name' => 'Melisandre',
                'image' => "melisandre.jpeg"
            ],
            [
                'name' => 'Jorah Mormont',
                'image' => "jorah-mormont.jpeg"
            ],
            [
                'name' => 'The Hound',
                'image' => "the-hound.jpeg"
            ],
            [
                'name' => 'The Mountain',
                'image' => "the-mountain.jpeg"
            ],
            [
                'name' => 'Samwell Tarley',
                'image' => "samwell-tarley.jpeg"
            ],
            [
                'name' => 'Gilly',
                'image' => "gilly.jpeg"
            ],
            [
                'name' => 'Sam (Child)',
                'image' => "sam-child.jpeg"
            ],
            [
                'name' => 'Lord Varys',
                'image' => "lord-varys.jpeg"
            ],
            [
                'name' => 'Brienne of Tarth',
                'image' => "brienne-of-tarth.jpeg"
            ],
            [
                'name' => 'Davos Seaworth',
                'image' => "davos-seaworth.jpeg"
            ],
            [
                'name' => 'Bronn',
                'image' => "bronn.jpeg"
            ],
            [
                'name' => 'Podrick Payne',
                'image' => "podrick-payne.jpeg"
            ],
            [
                'name' => 'Tormund Giantsbane',
                'image' => "tormund-giantsbane.jpeg"
            ],
            [
                'name' => 'Qyburn',
                'image' => "qyburn.jpeg"
            ],
            [
                'name' => 'Grey Worm',
                'image' => "grey-worm.jpeg"
            ],
            [
                'name' => 'Gendry',
                'image' => "gendry.jpeg"
            ],
            [
                'name' => 'Beric Dondarrion',
                'image' => "beric-dondarrion.jpeg"
            ],
            [
                'name' => 'Euron Greyjoy',
                'image' => "euron-greyjoy.jpeg"
            ],
            [
                'name' => 'Daario',
                'image' => "daario.jpeg"
            ],
            [
                'name' => 'Dolorous Edd',
                'image' => "dolorous-edd.jpeg"
            ],
            [
                'name' => 'Missandei',
                'image' => "missandei.jpeg"
            ],
            [
                'name' => 'Ghost',
                'image' => "ghost.jpeg"
            ],
            [
                'name' => 'Nymeria',
                'image' => "nymeria.jpeg"
            ]
        ]);
    }
}
