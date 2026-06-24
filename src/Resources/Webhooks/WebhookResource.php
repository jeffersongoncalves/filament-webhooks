<?php

namespace JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\RelationManagers\LogsRelationManager;
use JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\Schemas\WebhookForm;
use JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\Tables\WebhooksTable;
use JeffersonGoncalves\Webhooks\Models\Webhook;

class WebhookResource extends Resource
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBolt;

    public static function getModel(): string
    {
        /** @var class-string<Model> $model */
        $model = config('webhooks.models.webhook', Webhook::class);

        return $model;
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-webhooks.navigation.group');
    }

    public static function getNavigationSort(): ?int
    {
        $sort = config('filament-webhooks.navigation.sort');

        return $sort === null ? null : (int) $sort;
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-webhooks::webhooks.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament-webhooks::webhooks.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-webhooks::webhooks.plural_model_label');
    }

    public static function form(Schema $schema): Schema
    {
        return WebhookForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebhooksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            LogsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWebhooks::route('/'),
            'create' => Pages\CreateWebhook::route('/create'),
            'view' => Pages\ViewWebhook::route('/{record}'),
            'edit' => Pages\EditWebhook::route('/{record}/edit'),
        ];
    }
}
