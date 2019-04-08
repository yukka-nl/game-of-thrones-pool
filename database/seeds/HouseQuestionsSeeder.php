<?php

use Illuminate\Database\Seeder;
use App\HouseQuestion;
use App\HouseQuestionOption;

class HouseQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = HouseQuestion::create([
            'title' => 'What will happen to the Night King?',
        ]);
        HouseQuestionOption::create([
            'label' => 'Win',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'Die',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'Be replaced',
            'house_question_id' => $question->id
        ]);

        $question = HouseQuestion::create([
            'title' => 'Will we see Ice Spiders?',
        ]);
        HouseQuestionOption::create([
            'label' => 'Yes',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'No',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'Please, God, no.',
            'house_question_id' => $question->id
        ]);


        $question = HouseQuestion::create([
            'title' => 'Cleganebowl?',
        ]);
        HouseQuestionOption::create([
            'label' => 'The Mountain wins',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'The Hound wins',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'Won\'t take place',
            'house_question_id' => $question->id
        ]);

        $question = HouseQuestion::create([
            'title' => 'First blood! Who will die first?',
        ]);

        foreach (\App\Character::all() as $character) {
            HouseQuestionOption::create([
                'label' => $character->name,
                'house_question_id' => $question->id
            ]);
        }
        foreach (\App\HouseCharacter::all() as $character) {
            HouseQuestionOption::create([
                'label' => $character->name,
                'house_question_id' => $question->id
            ]);
        }
    }
}
