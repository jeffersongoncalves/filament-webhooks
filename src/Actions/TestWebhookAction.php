<?php

namespace JeffersonGoncalves\FilamentWebhooks\Actions;

use Closure;
use Filament\Actions\Action as PageAction;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action as TableAction;
use JeffersonGoncalves\Webhooks\Facades\Webhooks;
use JeffersonGoncalves\Webhooks\Models\Webhook;

class TestWebhookAction
{
    public static function make(string $name = 'test'): TableAction
    {
        return TableAction::make($name)
            ->label(__('filament-webhooks::webhooks.actions.test.label'))
            ->icon('heroicon-o-paper-airplane')
            ->color('gray')
            ->requiresConfirmation()
            ->action(static::handler());
    }

    public static function forPage(string $name = 'test'): PageAction
    {
        return PageAction::make($name)
            ->label(__('filament-webhooks::webhooks.actions.test.label'))
            ->icon('heroicon-o-paper-airplane')
            ->color('gray')
            ->requiresConfirmation()
            ->action(static::handler());
    }

    protected static function handler(): Closure
    {
        return function (Webhook $record): void {
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
        };
    }
}
