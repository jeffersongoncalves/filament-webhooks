<?php

namespace JeffersonGoncalves\FilamentWebhooks;

use Filament\Panel;
use JeffersonGoncalves\FilamentPluginCore\BasePlugin;
use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource;

class FilamentWebhooksPlugin extends BasePlugin
{
    public function getId(): string
    {
        return 'filament-webhooks';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            WebhookResource::class,
        ]);
    }
}
