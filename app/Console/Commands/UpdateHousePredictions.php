<?php

namespace App\Console\Commands;

use App\House;
use App\HouseCharacter;
use App\HouseQuestion;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateHousePredictions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:house-predictions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the correct predictions for all houses.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Updating correct guesses...');
        $houses = House::all();
        $houseCharacters = HouseCharacter::whereNotNull('status_id')->get();

        $bar = $this->output->createProgressBar($houseCharacters->count());
        foreach ($houseCharacters as $houseCharacter) {
            foreach ($houses as $house) {
                $housePrediction = $houseCharacter->getTopPredictionForHouseAsStatus($house);
                if ($housePrediction->id == $houseCharacter->status_id) {
                    $house->correct_predictions += 1;
                    $house->save();
                }
            }
            $bar->advance();
        }
        $bar->finish();
        $this->line(' All house character predictions updated!');

        $bar = $this->output->createProgressBar($houseCharacters->count());
        $houseQuestions = HouseQuestion::all();
        foreach ($houseQuestions as $question) {
            $correctAnswers = $question->getCorrectAnswers();
            foreach ($houses as $house) {
                $topAnswer = $question->getTopAnswerForHouse($house);
                if ($correctAnswers->contains('id', $topAnswer->id)) {
                    $house->correct_predictions += 1;
                    $house->save();
                }
            }
            $bar->advance();
        }
        $bar->finish();
        $this->line(' All house questions updated!');
    }
}
