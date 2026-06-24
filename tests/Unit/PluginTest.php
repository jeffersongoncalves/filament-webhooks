<?php

use Filament\Facades\Filament;
use JeffersonGoncalves\FilamentPluginCore\BasePlugin;
use JeffersonGoncalves\FilamentWebhooks\FilamentWebhooksPlugin;
use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource;

it('extends the shared base plugin', function () {
    expect(FilamentWebhooksPlugin::make())->toBeInstanceOf(BasePlugin::class);
});

it('has the expected id', function () {
    expect(FilamentWebhooksPlugin::make()->getId())->toBe('filament-webhooks');
});

it('is resolvable from the panel via get()', function () {
    expect(FilamentWebhooksPlugin::get())->toBeInstanceOf(FilamentWebhooksPlugin::class);
});

it('registers the webhook resource on the panel', function () {
    $resources = Filament::getPanel('admin')->getResources();

    expect($resources)->toContain(WebhookResource::class);
});
