<?php

namespace App\Console\Commands;

use App\House;
use App\HouseCharacter;
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
        $houseCharacters = HouseCharacter::whereNotNull('status_id')->get();
        
        $bar = $this->output->createProgressBar($houseCharacters->count());
        foreach ($houseCharacters as $houseCharacter) {
            $correctPredictionsQuery = DB::table('predictions')
                ->select('user_id')
                ->where('character_id', $houseCharacter->id)
                ->where('status_id', $houseCharacter->status_id);

            $correctPredictionsQuery->update(['is_correct' => true]);
            $correctPredictionsCollection = $correctPredictionsQuery->get();

            foreach (House::all() as $house) {
                $housePrediction = $houseCharacter->getTopPredictionForHouseAsStatus($house);
                if ($housePrediction->id == $houseCharacter->status_id) {
                    $house->correct_predictions += 1;
                    $house->save();
                }
            }
            $bar->advance();
        }
        $bar->finish();
        $this->line("\n" . 'All predictions updated!');
    }
}
