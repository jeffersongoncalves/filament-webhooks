<?php

namespace JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\Tables;

use Filament\Actions;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use JeffersonGoncalves\FilamentWebhooks\Actions\TestWebhookAction;
use JeffersonGoncalves\Webhooks\Enums\WebhookEvent;

class WebhooksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-webhooks::webhooks.table.name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('url')
                    ->label(__('filament-webhooks::webhooks.table.url'))
                    ->searchable()
                    ->copyable()
                    ->limit(40),
                TextColumn::make('events')
                    ->label(__('filament-webhooks::webhooks.table.events'))
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => WebhookEvent::tryFrom($state)?->label() ?? $state),
                ToggleColumn::make('is_active')
                    ->label(__('filament-webhooks::webhooks.table.is_active')),
                TextColumn::make('created_at')
                    ->label(__('filament-webhooks::webhooks.table.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('is_active')
                    ->label(__('filament-webhooks::webhooks.table.is_active')),
                SelectFilter::make('event')
                    ->label(__('filament-webhooks::webhooks.table.events'))
                    ->options(collect(WebhookEvent::cases())->mapWithKeys(fn (WebhookEvent $event) => [
                        $event->value => $event->label(),
                    ]))
                    ->query(function (Builder $query, array $data): Builder {
                        if (filled($data['value'])) {
                            return $query->whereJsonContains('events', $data['value']);
                        }

                        return $query;
                    }),
            ])
            ->recordActions([
                TestWebhookAction::make(),
                Actions\ViewAction::make(),
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->toolbarActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
