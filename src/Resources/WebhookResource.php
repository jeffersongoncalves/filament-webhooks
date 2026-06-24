<?php

namespace JeffersonGoncalves\FilamentWebhooks\Resources;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use JeffersonGoncalves\FilamentWebhooks\Actions\TestWebhookAction;
use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource\Pages;
use JeffersonGoncalves\FilamentWebhooks\Resources\WebhookResource\RelationManagers\LogsRelationManager;
use JeffersonGoncalves\Webhooks\Enums\WebhookEvent;
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
        return $schema
            ->columns(null)
            ->schema([
                Section::make(__('filament-webhooks::webhooks.form.section_endpoint'))
                    ->schema([
                        TextInput::make('name')
                            ->label(__('filament-webhooks::webhooks.form.name'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('url')
                            ->label(__('filament-webhooks::webhooks.form.url'))
                            ->required()
                            ->url()
                            ->maxLength(2048),
                        TextInput::make('secret')
                            ->label(__('filament-webhooks::webhooks.form.secret'))
                            ->helperText(__('filament-webhooks::webhooks.form.secret_helper'))
                            ->maxLength(255)
                            ->suffixAction(
                                Action::make('generateSecret')
                                    ->label(__('filament-webhooks::webhooks.form.generate_secret'))
                                    ->icon(Heroicon::OutlinedArrowPath)
                                    ->action(fn (Set $set) => $set('secret', Str::random(40)))
                            ),
                        TextInput::make('model')
                            ->label(__('filament-webhooks::webhooks.form.model'))
                            ->helperText(__('filament-webhooks::webhooks.form.model_helper'))
                            ->maxLength(255),
                    ])->columns(2),

                Section::make(__('filament-webhooks::webhooks.form.section_events'))
                    ->schema([
                        CheckboxList::make('events')
                            ->label(__('filament-webhooks::webhooks.form.events'))
                            ->options(collect(WebhookEvent::cases())->mapWithKeys(fn (WebhookEvent $event) => [
                                $event->value => $event->label(),
                            ]))
                            ->required()
                            ->columns(3)
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label(__('filament-webhooks::webhooks.form.is_active'))
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
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
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
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
