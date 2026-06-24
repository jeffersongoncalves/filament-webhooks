<?php

namespace JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\WebhookResource;

class ListWebhooks extends ListRecords
{
    protected static string $resource = WebhookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
