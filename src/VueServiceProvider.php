<?php

namespace Usanzadunje\Vue;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Usanzadunje\Vue\Commands\VueCommand;

class VueServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('artisan-vue')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_artisan-vue_table')
            ->hasCommand(VueCommand::class);
    }
}
