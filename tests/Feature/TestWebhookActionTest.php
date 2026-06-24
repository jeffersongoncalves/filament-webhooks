<?php

use Illuminate\Support\Facades\Bus;
use JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\Pages\ListWebhooks;
use JeffersonGoncalves\FilamentWebhooks\Tests\Fixtures\TestUser;
use JeffersonGoncalves\Webhooks\Models\Webhook;
use Spatie\WebhookServer\CallWebhookJob;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->actingAs(new TestUser(['id' => 1, 'name' => 'Admin', 'email' => 'admin@example.com']));
});

it('runs the test action and notifies the user', function () {
    Bus::fake();

    $webhook = Webhook::factory()->create(['url' => 'https://example.com/hook']);

    livewire(ListWebhooks::class)
        ->callTableAction('test', $webhook)
        ->assertNotified();

    Bus::assertDispatchedSync(CallWebhookJob::class);
});
