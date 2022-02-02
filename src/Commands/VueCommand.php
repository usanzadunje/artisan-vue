<?php

namespace Usanzadunje\Vue\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class VueCommand extends Command
{
    public $signature = 'vue:make 
    {asset : Asset being created.} 
    {path : Name or path of the file which will be created}';

    public $description = 'Generates scaffolding for Vue content.';

    public function handle(): int
    {
        switch($this->argument('asset'))
        {
            case 'component':
                $componentsDir = config('artisan-vue.components_dir');

                $this->copyAsset('Component.vue', "$componentsDir/{$this->argument('path')}.vue");
                break;
            case 'view':
                $viewsDir = config('artisan-vue.views_dir');

                $this->copyAsset('Component.vue', "$viewsDir/{$this->argument('path')}.vue");
                break;
            case 'composable':
                $composablesDir = config('artisan-vue.composables_dir');

                $this->copyAsset('Composable.js', "$composablesDir/{$this->argument('path')}.js");
                break;
            case 'service':
                $servicesDir = config('artisan-vue.services_dir');

                $this->copyAsset('Service.js', "$servicesDir/{$this->argument('path')}.js");
                break;
            case 'vuex-module':
                $vuexModulesDir = config('artisan-vue.vuex_modules_dir');

                $this->copyAsset('Module.js', "$vuexModulesDir/{$this->argument('path')}.js");
                break;
            default:
                $this->error('Unknown asset name. Use `php artisan vue:assets` to see the list of all available assets.');
                break;
        }

        return self::SUCCESS;
    }

    /**
     * Copies stub files to appropriate location inside users project.
     *
     * @param string $stubName
     * @param string $resourcePath
     * @return void
     */
    private function copyAsset(string $stubName, string $resourcePath)
    {
        $this->ensureDirectoriesExist(resource_path("js"), $resourcePath);

        copy(__DIR__ . "/../stubs/$stubName", resource_path("js/$resourcePath"));
    }

    /**
     * Checks whether all directories provided exist and creates them if the do not.
     *
     * @param string $basePath
     * @param string $path
     * @return void
     */
    private function ensureDirectoriesExist(string $basePath, string $path)
    {
        $path = trim($path, '/');
        $pathParts = explode('/', $path);
        $dirs = array_slice($pathParts, 0, count($pathParts) - 1);

        (new Filesystem)->ensureDirectoryExists($basePath);

        foreach($dirs as $dir)
        {
            (new Filesystem)->ensureDirectoryExists("$basePath/$dir");
        }
    }
}
