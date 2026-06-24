<?php

use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource\Pages\CreateWebhook;
use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource\Pages\EditWebhook;
use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource\Pages\ListWebhooks;
use JeffersonGoncalves\FilamentWebhooks\Tests\Fixtures\TestUser;
use JeffersonGoncalves\Webhooks\Enums\WebhookEvent;
use JeffersonGoncalves\Webhooks\Models\Webhook;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(new TestUser(['id' => 1, 'name' => 'Admin', 'email' => 'admin@example.com']));
});

it('renders the list page', function () {
    Webhook::factory()->count(3)->create();

    livewire(ListWebhooks::class)
        ->assertSuccessful()
        ->assertCanSeeTableRecords(Webhook::all());
});

it('creates a webhook through the create page', function () {
    livewire(CreateWebhook::class)
        ->fillForm([
            'name' => 'Order created',
            'url' => 'https://example.com/hooks/orders',
            'events' => [WebhookEvent::Created->value],
            'is_active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('webhooks', [
        'name' => 'Order created',
        'url' => 'https://example.com/hooks/orders',
    ]);
});

it('validates required fields on create', function () {
    livewire(CreateWebhook::class)
        ->fillForm([
            'name' => null,
            'url' => null,
            'events' => [],
        ])
        ->call('create')
        ->assertHasFormErrors(['name', 'url', 'events']);
});

it('edits an existing webhook', function () {
    $webhook = Webhook::factory()->create(['name' => 'Old name']);

    livewire(EditWebhook::class, ['record' => $webhook->getRouteKey()])
        ->fillForm(['name' => 'New name'])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($webhook->refresh()->name)->toBe('New name');
});

it('deletes a webhook from the edit page', function () {
    $webhook = Webhook::factory()->create();

    livewire(EditWebhook::class, ['record' => $webhook->getRouteKey()])
        ->callAction('delete');

    $this->assertModelMissing($webhook);
});
