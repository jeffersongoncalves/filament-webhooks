<?php

use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource;
use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource\RelationManagers\LogsRelationManager;
use JeffersonGoncalves\Webhooks\Models\Webhook;

it('resolves the configured model', function () {
    expect(WebhookResource::getModel())->toBe(Webhook::class);
});

it('exposes string labels', function () {
    expect(WebhookResource::getNavigationLabel())->toBeString()
        ->and(WebhookResource::getModelLabel())->toBeString()
        ->and(WebhookResource::getPluralModelLabel())->toBeString();
});

it('has the standard crud pages', function () {
    expect(WebhookResource::getPages())
        ->toBeArray()
        ->toHaveKeys(['index', 'create', 'view', 'edit']);
});

it('registers the logs relation manager', function () {
    expect(WebhookResource::getRelations())->toContain(LogsRelationManager::class);
});

it('reads the navigation group from config', function () {
    config(['filament-webhooks.navigation.group' => 'Integrations']);

    expect(WebhookResource::getNavigationGroup())->toBe('Integrations');
});
