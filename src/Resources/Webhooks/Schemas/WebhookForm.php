<?php

namespace JeffersonGoncalves\FilamentWebhooks\Resources\Webhooks\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;
use JeffersonGoncalves\Webhooks\Enums\WebhookEvent;

class WebhookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
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
}
