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
            'label' => 'Lives',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'Dies',
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
            'label' => 'Draw',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'Won\'t take place',
            'house_question_id' => $question->id
        ]);

        $question = HouseQuestion::create([
            'title' => 'How many times will we hear the phrase "Winter has come."?',
        ]);
        HouseQuestionOption::create([
            'label' => 'Never',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'Fewer than 5 times',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'Between 5 and 10 times',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'More than 10 times',
            'house_question_id' => $question->id
        ]);

        $question = HouseQuestion::create([
            'title' => 'Will Jon ride a dragon (excluding Daenerys)?',
        ]);
        HouseQuestionOption::create([
            'label' => 'Yes',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'No',
            'house_question_id' => $question->id
        ]);

        $question = HouseQuestion::create([
            'title' => 'Will Tyrion ride a dragon?',
        ]);
        HouseQuestionOption::create([
            'label' => 'Yes',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'No',
            'house_question_id' => $question->id
        ]);

        $question = HouseQuestion::create([
            'title' => 'Will Arya ride a dragon?',
        ]);
        HouseQuestionOption::create([
            'label' => 'Yes',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'No',
            'house_question_id' => $question->id
        ]);

        $question = HouseQuestion::create([
            'title' => 'Will King\'s Landing still be standing when the season is over?',
        ]);
        HouseQuestionOption::create([
            'label' => 'Yes',
            'house_question_id' => $question->id
        ]);
        HouseQuestionOption::create([
            'label' => 'No',
            'house_question_id' => $question->id
        ]);

        $question = HouseQuestion::create([
            'title' => 'Which character will be the first to die this season?',
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

        $question = HouseQuestion::create([
            'title' => 'Which character will be the last to die this season?',
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
