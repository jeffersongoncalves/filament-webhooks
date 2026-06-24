<?php

namespace JeffersonGoncalves\FilamentWebhooks\Actions;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use JeffersonGoncalves\Webhooks\Facades\Webhooks;
use JeffersonGoncalves\Webhooks\Models\Webhook;

class TestWebhookAction
{
    public static function make(string $name = 'test'): Action
    {
        return Action::make($name)
            ->label(__('filament-webhooks::webhooks.actions.test.label'))
            ->icon(Heroicon::OutlinedPaperAirplane)
            ->color('gray')
            ->requiresConfirmation()
            ->action(function (Webhook $record): void {
                $log = Webhooks::test($record);

                if ($log->success) {
                    Notification::make()
                        ->title(__('filament-webhooks::webhooks.actions.test.success'))
                        ->body($log->response_code ? (string) $log->response_code : null)
                        ->success()
                        ->send();

                    return;
                }

                Notification::make()
                    ->title(__('filament-webhooks::webhooks.actions.test.failed'))
                    ->body($log->error_message)
                    ->danger()
                    ->send();
            });
    }
}
