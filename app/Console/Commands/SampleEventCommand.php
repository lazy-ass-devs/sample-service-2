<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\ExampleEvent;

class SampleEventCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:sample:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sample event send';

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
        event(new ExampleEvent());
    }
}