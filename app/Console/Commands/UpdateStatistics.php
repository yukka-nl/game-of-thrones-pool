<?php

namespace App\Console\Commands;

use App\Character;
use App\Prediction;
use App\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the total_predictions key in the statistics table. Update each death, alive and wight count in the character table';

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

        $this->updateCharacterPredictionCounts();
        $this->updateTotalPredictionCount();


        $this->line("Successfully updated all statistics");
    }

    public function updateCharacterPredictionCounts()
    {
        $characters = Character::all();
        $bar = $this->output->createProgressBar(count($characters));

        foreach ($characters as $character) {
            $characterPredictions = DB::table('predictions')->where('character_id', $character->id)->get();
            $character->alive_prediction_count = $characterPredictions->where('status_id', 1)->count();
            $character->dead_prediction_count = $characterPredictions->where('status_id', 2)->count();
            $character->wight_prediction_count = $characterPredictions->where('status_id', 3)->count();
            $character->save();
            $bar->advance();
        }
        $bar->finish();
    }

    public function updateTotalPredictionCount()
    {
        $totalPredictions = Statistic::firstOrCreate(['key' => 'total_predictions']);
        $totalPredictions->value = DB::table('predictions')->distinct('user_id')->count('user_id');
        $totalPredictions->save();
    }
}
