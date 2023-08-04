<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CheckS3Command extends Command
{
    protected $signature = 'check:s3';

    protected $description = 'List all the files in the s3 bucket';

    public function handle()
    {
        $files = Storage::disk('s3')->allFiles();

        dump($files);
    }
}
