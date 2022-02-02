<?php

namespace Usanzadunje\Vue\Commands;

use Illuminate\Console\Command;

class VueCommand extends Command
{
    public $signature = 'vue:make 
    {asset : Asset being created.} 
    {name : Name of the file which will be created}';

    public $description = 'Generates scaffolding for Vue content.';

    public function handle(): int
    {
        switch($this->argument('asset'))
        {
            case 'component':
                $this->makeComponent($this->argument('name'));
                break;
            case 'view':
                $this->makeView($this->argument('name'));
                break;
            case 'composable':
                $this->makeComposable($this->argument('name'));
                break;
            case 'service':
                $this->makeService($this->argument('name'));
                break;
            case 'vuex-module':
                $this->makeVuexModule($this->argument('name'));
                break;
        }

        return self::SUCCESS;
    }

    private function makeComponent(string $name)
    {
        $componentsDir = config('components_dir');
        copy(__DIR__ . '../stubs/Component.vue', resource_path("js/$componentsDir/$name"));
    }

    private function makeView(string $name)
    {
        $viewsDir = config('components_dir');
        copy(__DIR__ . '../stubs/Component.vue', resource_path("js/$viewsDir/$name"));
    }

    private function makeComposable(string $name)
    {
        $composablesDir = config('components_dir');
        copy(__DIR__ . '../stubs/Component.vue', resource_path("js/$composablesDir/$name"));
    }

    private function makeVuexModule(string $name)
    {
        $vuexModulesDir = config('components_dir');
        copy(__DIR__ . '../stubs/Component.vue', resource_path("js/$vuexModulesDir/$name"));
    }

    private function makeService(string $name)
    {
        $servicesDir = config('components_dir');
        copy(__DIR__ . '../stubs/Component.vue', resource_path("js/$servicesDir/$name"));
    }
}
