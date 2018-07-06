<?php

namespace App\Console\Commands;

use App\ApiSources;
use App\Importers\APISync;
use Illuminate\Console\Command;

class SyncAPIs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apis:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync external APIs';

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

        $APISync = new APISync();

        $APISync->run();

    }
}
