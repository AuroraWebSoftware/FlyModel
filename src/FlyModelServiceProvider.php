<?php

namespace AuroraWebSoftware\FlyModel;

use AuroraWebSoftware\FlyModel\Commands\FlyModelCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FlyModelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('flymodel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_flymodel_table')
            ->hasCommand(FlyModelCommand::class);
    }
}
