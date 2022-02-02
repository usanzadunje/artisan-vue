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
            default:
                $this->error('Unknown asset name. Use `php artisan vue:assets` to see the list of all available assets.');
                break;
        }

        return self::SUCCESS;
    }

    private function makeComponent(string $name)
    {
        $componentsDir = config('artisan-vue.components_dir');
        copy(__DIR__ . '/../stubs/Component.vue', resource_path("js/$componentsDir/$name.vue"));
    }

    private function makeView(string $name)
    {
        $viewsDir = config('artisan-vue.views_dir');
        copy(__DIR__ . '/../stubs/Component.vue', resource_path("js/$viewsDir/$name.vue"));
    }

    private function makeComposable(string $name)
    {
        $composablesDir = config('artisan-vue.composables_dir');
        copy(__DIR__ . '/../stubs/Composable.js', resource_path("js/$composablesDir/$name.js"));
    }

    private function makeVuexModule(string $name)
    {
        $vuexModulesDir = config('artisan-vue.vuex_modules_dir');
        copy(__DIR__ . '/../stubs/Module.js', resource_path("js/$vuexModulesDir/$name.js"));
    }

    private function makeService(string $name)
    {
        $servicesDir = config('artisan-vue.services_dir');
        copy(__DIR__ . '/../stubs/Service.js', resource_path("js/$servicesDir/$name.js"));
    }
}
