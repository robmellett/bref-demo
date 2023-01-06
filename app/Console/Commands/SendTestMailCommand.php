<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use Illuminate\Console\Command;

class SendTestMailCommand extends Command
{
    protected $signature = 'send:test-mail';

    protected $description = 'Send a test job to the queue';

    public function handle()
    {
        dispatch(new TestJob());
    }
}
