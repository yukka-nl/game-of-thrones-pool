<?php

namespace App\Console\Commands;

use App\Character;
use App\User;
use Illuminate\Console\Command;

class UpdateCharacterStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:character-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $users = User::all();
        $characters = Character::all();
        foreach ($users as $user) {
            if ($user->hasPredictions()){
                foreach ($characters as $character) {
                    if ($character->status_id == $user->characterPrediction($character->id)->id) {
                        $user->correct_guesses += 1;
                    }
                }
                $user->save();
            }
        }
    }
}
