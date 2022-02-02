<?php

namespace Usanzadunje\Vue\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeCommand extends Command
{
    public $signature = 'vue:make 
    {resource : Resource being created.} 
    {path : Name or path of the file which will be created}';

    public $description = 'Generates basic template for Vue resources.';

    public function handle(): int
    {
        $resource = $this->argument('resource');
        $resourcePath = $this->argument('path');

        switch($resource)
        {
            case 'component':
                $this->component($resource, $resourcePath);
                break;
            case 'view':
                $this->view($resource, $resourcePath);
                break;
            case 'composable':
            case 'hook':
                $this->composable($resource, $resourcePath);
                break;
            case 'service':
                $this->service($resource, $resourcePath);
                break;
            case 'vuex-module':
            case 'module':
                $this->vuexModule($resource, $resourcePath);
                break;
            default:
                $this->unknownResource($resource);
                break;
        }

        return self::SUCCESS;
    }

    /**
     * Generates basic template for Vue component.
     *
     * @param string $resource
     * @param string $resourcePath
     * @return void
     */
    private function component(string $resource, string $resourcePath)
    {
        $componentsDir = config('artisan-vue.components_dir', 'components');
        $this->generateResource('Component.vue', "$componentsDir/$resourcePath.vue");
        $this->info("Successfully created $resource inside $componentsDir/$resourcePath.vue");
    }

    /**
     * Generates basic template for Vue view.
     *
     * @param string $resource
     * @param string $resourcePath
     * @return void
     */
    private function view(string $resource, string $resourcePath)
    {
        $viewsDir = config('artisan-vue.views_dir', 'views');
        $this->generateResource('Component.vue', "$viewsDir/$resourcePath.vue");
        $this->info("Successfully created $resource inside $viewsDir/$resourcePath.vue");
    }

    /**
     * Generates basic template for Vue composable(hook).
     *
     * @param string $resource
     * @param string $resourcePath
     * @return void
     */
    private function composable(string $resource, string $resourcePath)
    {
        $composablesDir = config('artisan-vue.composables_dir', 'composables');
        $this->generateResource('Composable.js', "$composablesDir/$resourcePath.js");
        $this->info("Successfully created $resource inside $composablesDir/$resourcePath.js");
    }

    /**
     * Generates basic template for Vue service.
     *
     * @param string $resource
     * @param string $resourcePath
     * @return void
     */
    private function service(string $resource, string $resourcePath)
    {
        $servicesDir = config('artisan-vue.services_dir', 'services');
        $this->generateResource('Service.js', "$servicesDir/$resourcePath.js");
        $this->info("Successfully created $resource inside $servicesDir/$resourcePath.js");
    }

    /**
     * Generates basic template for Vuex module.
     *
     * @param string $resource
     * @param string $resourcePath
     * @return void
     */
    private function vuexModule(string $resource, string $resourcePath)
    {
        $vuexModulesDir = config('artisan-vue.vuex-modules_dir', 'store/modules');
        $this->generateResource('Module.js', "$vuexModulesDir/$resourcePath.js");
        $this->info("Successfully created $resource inside $vuexModulesDir/$resourcePath.js");
    }

    /**
     * Displays error message when trying to create unknown resource.
     *
     * @param string $resource
     * @return void
     */
    private function unknownResource(string $resource)
    {
        $this->error('');
        $this->error('                                                                                                    ');
        $this->error("  Unknown resource '$resource'. Use 'php artisan vue:list' to see the list of all available resources.    ");
        $this->error('                                                                                                    ');
        $this->error('');
    }

    /**
     * Copies stub files to appropriate location inside project.
     *
     * @param string $stubName
     * @param string $resourcePath
     * @return void
     */
    private function generateResource(string $stubName, string $resourcePath)
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
