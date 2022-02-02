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
        $headers = ['Name', 'Description'];
        $data = [
            [
                'name' => 'component',
                'description' => 'Generates Vue component template inside specified components directory.',
            ],
            [
                'name' => 'view',
                'description' => 'Generates Vue component template inside specified views directory.',
            ],
            [
                'name' => 'composable|hook',
                'description' => 'Generates Vue composable(hook) template inside specified composables directory.',
            ],
            [
                'name' => 'service',
                'description' => 'Generates Vue service template inside specified services directory.',
            ],
            [
                'name' => 'vuex-module|module',
                'description' => 'Generates Vuex module template inside specified vuex-modules directory.',
            ],
        ];

        $this->table($headers, $data, 'box');

        return self::SUCCESS;
    }
}
