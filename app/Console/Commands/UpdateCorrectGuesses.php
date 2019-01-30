<?php

namespace App\Console\Commands;

use App\Character;
use App\User;
use Illuminate\Console\Command;

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
        $users = User::all();
        $characters = Character::all();
        $bar = $this->output->createProgressBar(count($users));
        foreach ($users as $user) {
            if ($user->hasPredictions()){
                foreach ($characters as $character) {
                    if ($character->status_id == $user->characterPrediction($character->id)->id) {
                        $user->correct_guesses += 1;
                    }
                }
                $user->save();
            }
            $bar->advance();
        }
        $bar->finish();
        $this->line(' All users updated!');
    }
}
