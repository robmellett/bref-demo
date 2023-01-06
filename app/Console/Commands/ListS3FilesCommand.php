<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ListS3FilesCommand extends Command
{
    protected $signature = 'list:s3-files';

    protected $description = 'List all the files in the s3 bucket';

    public function handle()
    {
        $files = Storage::disk('s3')->allFiles();

        dump($files);
    }
}
