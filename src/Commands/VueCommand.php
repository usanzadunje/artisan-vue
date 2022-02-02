<?php

namespace Usanzadunje\Vue\Commands;

use Illuminate\Console\Command;

class VueCommand extends Command
{
    public $signature = 'artisan-vue';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
