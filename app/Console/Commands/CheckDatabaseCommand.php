<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CheckDatabaseCommand extends Command
{
    protected $signature = 'check:database';

    protected $description = 'List all the users in the database';

    public function handle()
    {
        $users = User::all();

        dump($users);
    }
}
