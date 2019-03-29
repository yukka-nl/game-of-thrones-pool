<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearGuesses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:clear-guesses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears the correct_guesses column for all users.';

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
        DB::table('users')->update(['correct_guesses' => 0]);
        $this->line('Correct guesses have been reset.');
    }
}
