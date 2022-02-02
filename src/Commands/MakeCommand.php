<?php

namespace Usanzadunje\Vue\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeCommand extends Command
{
    public $signature = 'vue:make 
    {resource : Resource being created.} 
    {path : Name or path of the file which will be created}';

    public $description = 'Generates scaffolding for Vue content.';

    public function handle(): int
    {
        switch($this->argument('resource'))
        {
            case 'component':
                $componentsDir = config('artisan-vue.components_dir', 'components');

                $this->copyResource('Component.vue', "$componentsDir/{$this->argument('path')}.vue");
                break;
            case 'view':
                $viewsDir = config('artisan-vue.views_dir', 'views');

                $this->copyResource('Component.vue', "$viewsDir/{$this->argument('path')}.vue");
                break;
            case 'composable':
            case 'hook':
                $composablesDir = config('artisan-vue.composables_dir', 'composables');

                $this->copyResource('Composable.js', "$composablesDir/{$this->argument('path')}.js");
                break;
            case 'service':
                $servicesDir = config('artisan-vue.services_dir', 'services');

                $this->copyResource('Service.js', "$servicesDir/{$this->argument('path')}.js");
                break;
            case 'vuex-module':
            case 'module':
                $vuexModulesDir = config('artisan-vue.vuex-modules_dir', 'store/modules');

                $this->copyResource('Module.js', "$vuexModulesDir/{$this->argument('path')}.js");
                break;
            default:
                $this->error('Unknown resource name. Use `php artisan vue:list` to see the list of all available resources.');
                break;
        }

        return self::SUCCESS;
    }

    /**
     * Copies stub files to appropriate location inside project.
     *
     * @param string $stubName
     * @param string $resourcePath
     * @return void
     */
    private function copyResource(string $stubName, string $resourcePath)
    {
        $vueBasePath = config('artisan-vue.vue_root_dir');

        $this->ensureDirectoriesExist($vueBasePath, $resourcePath);

        copy(__DIR__ . "/../stubs/$stubName", "$vueBasePath/$resourcePath");
    }

    /**
     * Checks whether all directories provided exist and creates them if they do not.
     *
     * @param string $basePath
     * @param string $resourcePath
     * @return void
     */
    private function ensureDirectoriesExist(string $basePath, string $resourcePath)
    {
        $resourcePath = trim($resourcePath, '/');

        // Generating array of path pieces which represent directories to the resource and resource file itself
        $pathParts = explode('/', $resourcePath);

        // Removing last part of path which represents file itself
        $dirs = array_slice($pathParts, 0, count($pathParts) - 1);

        // Taking first directory which represents top level directory for specified resource
        $resourceDirs = '';

        // Making sure each directory to provided resource exists and if it does not, create it
        foreach($dirs as $dir)
        {
            $resourceDirs .= "/$dir";

            (new Filesystem)->ensureDirectoryExists($basePath . $resourceDirs);
        }
    }
}