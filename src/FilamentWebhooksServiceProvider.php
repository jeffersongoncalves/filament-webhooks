<?php

namespace JeffersonGoncalves\FilamentWebhooks;

use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentWebhooksServiceProvider extends BasePackageServiceProvider
{
    public static string $name = 'filament-webhooks';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasTranslations();
    }
}
