<?php

use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use JeffersonGoncalves\FilamentWebhooks\FilamentWebhooksServiceProvider;

it('extends the shared base package service provider', function () {
    $provider = new FilamentWebhooksServiceProvider(app());

    expect($provider)->toBeInstanceOf(BasePackageServiceProvider::class);
});

it('loads the package translations', function () {
    expect(__('filament-webhooks::webhooks.navigation_label'))->toBe('Webhooks');
});
