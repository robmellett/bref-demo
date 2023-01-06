<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use Illuminate\Console\Command;

class ChecktMailCommand extends Command
{
    protected $signature = 'check:mail';

    protected $description = 'Send a test job to the queue';

    public function handle()
    {
        dispatch(new TestJob());
    }
}
