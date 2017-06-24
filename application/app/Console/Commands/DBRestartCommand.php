<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DBRestartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:restart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove Tables, Migrate Tables, Seed Tables';

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
        $this->call('db:truncate');
        $this->call('migrate');
        $this->call('db:seed');
    }
}
