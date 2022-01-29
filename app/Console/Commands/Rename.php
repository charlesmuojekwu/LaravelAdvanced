<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Rename extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Users:rename {From: Name of users application table you want to rename} {To: Name you wnat to give now}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rename users Table description';

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
     * @return int
     */
    public function handle()
    {
        $from = $this->argument('from');
        $to = $this->argument('to');
        DB::statement("ALTER TABLE $from RENAME TO $to");

        $this->info("Table $from is now renamed to $to");
    }
}
