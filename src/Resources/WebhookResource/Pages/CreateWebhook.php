<?php

namespace JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource;

class CreateWebhook extends CreateRecord
{
    protected static string $resource = WebhookResource::class;
}
