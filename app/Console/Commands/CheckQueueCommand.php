<?php

namespace App\Console\Commands;

use App\Jobs\TestQueueJob;
use Illuminate\Console\Command;

class CheckQueueCommand extends Command
{
    protected $signature = 'check:queue';

    protected $description = 'Send a test job to the queue';

    public function handle()
    {
        dispatch(new TestQueueJob());
    }
}
