<?php

namespace JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use JeffersonGoncalves\Webhooks\Enums\WebhookEvent;

class LogsRelationManager extends RelationManager
{
    protected static string $relationship = 'logs';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('filament-webhooks::webhooks.relation_managers.logs.title');
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('success')
                    ->label(__('filament-webhooks::webhooks.relation_managers.logs.success'))
                    ->boolean(),
                TextColumn::make('event')
                    ->label(__('filament-webhooks::webhooks.relation_managers.logs.event'))
                    ->badge()
                    ->formatStateUsing(fn (?string $state): ?string => $state === null
                        ? null
                        : (WebhookEvent::tryFrom($state)?->label() ?? $state)),
                TextColumn::make('response_code')
                    ->label(__('filament-webhooks::webhooks.relation_managers.logs.response_code'))
                    ->numeric(),
                TextColumn::make('error_message')
                    ->label(__('filament-webhooks::webhooks.relation_managers.logs.error_message'))
                    ->limit(60)
                    ->toggleable(),
                TextColumn::make('attempt')
                    ->label(__('filament-webhooks::webhooks.relation_managers.logs.attempt'))
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label(__('filament-webhooks::webhooks.relation_managers.logs.created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('success')
                    ->label(__('filament-webhooks::webhooks.relation_managers.logs.success')),
            ]);
    }
}
