<?php

namespace App\Console\Commands;

use App\Character;
use App\Prediction;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateCorrectGuesses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:correct-guesses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the correct guesses for all users.';

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
        $characters = Character::whereNotNull('status_id')->get();

        $bar = $this->output->createProgressBar($characters->count());
        foreach ($characters as $character) {
            $correctPredictions = DB::table('predictions')
                ->select('user_id')
                ->where('character_id', $character->id)
                ->where('status_id', $character->status_id)
                ->get();

            DB::table('users')
                ->whereIn('id', $correctPredictions->pluck('user_id'))
                ->increment('correct_guesses');
            $bar->advance();
        }
        $bar->finish();

        $this->line(' All predictions updated!');
    }
}
