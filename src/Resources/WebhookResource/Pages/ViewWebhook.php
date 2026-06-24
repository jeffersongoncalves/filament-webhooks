<?php

namespace JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\FilamentWebhooks\Actions\TestWebhookAction;
use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource;

class ViewWebhook extends ViewRecord
{
    protected static string $resource = WebhookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            TestWebhookAction::forPage(),
            Actions\EditAction::make(),
        ];
    }
}
