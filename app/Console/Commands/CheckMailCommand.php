<?php

namespace App\Console\Commands;

use App\Mail\TestMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckMailCommand extends Command
{
    protected $signature = 'check:mail';

    protected $description = 'Check the mail driver is configured';

    public function handle()
    {
        Mail::send(new TestMail());
    }
}
