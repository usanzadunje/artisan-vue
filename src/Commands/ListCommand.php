<?php

namespace Usanzadunje\Vue\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ListCommand extends Command
{
    public $signature = 'vue:list';

    public $description = 'Lists all available resources to use with make command.';

    public function handle(): int
    {

        return self::SUCCESS;
    }
}
