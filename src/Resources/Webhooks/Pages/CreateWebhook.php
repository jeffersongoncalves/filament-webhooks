<?php

namespace JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\Pages;

use Filament\Resources\Pages\CreateRecord;
use JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\WebhookResource;

class CreateWebhook extends CreateRecord
{
    protected static string $resource = WebhookResource::class;
}
