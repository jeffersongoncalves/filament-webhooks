<?php

namespace JeffersonGoncalves\FilamentWebhooks\Tests\Fixtures;

use Filament\Panel;
use Filament\PanelProvider;
use JeffersonGoncalves\FilamentWebhooks\FilamentWebhooksPlugin;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->plugins([
                FilamentWebhooksPlugin::make(),
            ]);
    }
}
