<?php

namespace App\Console\Commands;

use App\House;
use App\User;
use Illuminate\Console\Command;

class AssignUsersToHouse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pod:assign-users-house {--w|weighted}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign users who have not joined a House to a random one.';

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
        $usersWithoutHouse = User::whereNull('house_id')->get();
        $this->line($usersWithoutHouse->count() . ' users without a House.');

        if($this->option('weighted')){
            $this->assignBasedOnWeight($usersWithoutHouse);
        } else {
            $this->assignRandomly($usersWithoutHouse);
        }
        $this->line('All users assigned to houses.');
    }

    private function assignBasedOnWeight($usersWithoutHouse) {
        $this->line('Assigning users based on current user spread.');
        $houses = House::all();
        $usersWithHouse = $houses->sum(function($house) {
            return $house->users->count();
        });

        $usersPerHouse = $houses->map(function($house) {
            return $house->users->count();
        });

        $probabilities = collect();
        foreach ($usersPerHouse as $key=>$userCount) {
            $prob = $usersWithHouse / $userCount;
            $probabilities->push($prob);
            $this->line('Chance of joining ' . House::find($key + 1)->name . ": \t" . $prob);
        }

        $results = collect();
        foreach ($usersWithoutHouse as $user) {
            $rand = mt_rand(1, $probabilities->sum());
            foreach ($probabilities as $key => $value) {
                $rand -= $value;
                if ($rand <= 0) {
                    $houseId = $key + 1;
                    $results->push($houseId);
                    $user->house_id = $houseId;
                    $user->save();
                    break;
                }
            }
        }
    }

    private function assignRandomly($usersWithoutHouse) {
        $this->line('Assigning users randomly.');
        foreach ($usersWithoutHouse as $user) {
            $houseId = rand(1,10);
            $user->house_id = $houseId;
            $user->save();
        }
    }
}
