<?php

namespace JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use JeffersonGoncalves\FilamentWebhooks\Actions\TestWebhookAction;
use JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\WebhookResource;

class EditWebhook extends EditRecord
{
    protected static string $resource = WebhookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            TestWebhookAction::make(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
