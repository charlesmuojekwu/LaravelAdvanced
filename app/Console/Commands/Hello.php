<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * 
     * THE {name} means it expects an argument
     */
    protected $signature = 'Hello {name=charles} {--L| lastname=muojekwu}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is Make command';

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
        //$this->argument('name')
        //$this->option('lastname')
        $name = $this->ask('What are your other names');

        $confirm = $this->confirm('do you want to print your name');

        if($confirm)
            $this->info($name);
        
        //$this->error('Exited');
    }
}
