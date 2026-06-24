<?php

namespace JeffersonGoncalves\FilamentWebhooks\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Filament\Actions\ActionsServiceProvider;
use Filament\Facades\Filament;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Infolists\InfolistsServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Filament\Schemas\SchemasServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Filament\Widgets\WidgetsServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JeffersonGoncalves\FilamentWebhooks\FilamentWebhooksServiceProvider;
use JeffersonGoncalves\FilamentWebhooks\Tests\Fixtures\TestPanelProvider;
use JeffersonGoncalves\FilamentWebhooks\Tests\Fixtures\TestUser;
use JeffersonGoncalves\Webhooks\WebhooksServiceProvider;
use Livewire\LivewireServiceProvider;
use Livewire\Mechanisms\DataStore;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Spatie\WebhookServer\WebhookServerServiceProvider;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'JeffersonGoncalves\\Webhooks\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        // Filament v5's SupportServiceProvider overrides Livewire's DataStore
        // with DataStoreOverride using bind() instead of singleton(), causing a
        // new instance (with its own WeakMap) on every resolve. This breaks
        // getErrorBag() which stores/retrieves across different WeakMap
        // instances. Fix: resolve once and re-register as a singleton instance.
        $dataStore = app(DataStore::class);
        app()->instance(DataStore::class, $dataStore);

        Filament::setCurrentPanel(Filament::getDefaultPanel());

        $this->withoutVite();
    }

    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            BladeIconsServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            SupportServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            SchemasServiceProvider::class,
            TablesServiceProvider::class,
            ActionsServiceProvider::class,
            InfolistsServiceProvider::class,
            NotificationsServiceProvider::class,
            WidgetsServiceProvider::class,
            WebhookServerServiceProvider::class,
            WebhooksServiceProvider::class,
            TestPanelProvider::class,
            FilamentWebhooksServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('app.key', 'base64:'.base64_encode(random_bytes(32)));
        $app['config']->set('auth.providers.users.model', TestUser::class);

        $app['config']->set('webhooks.enabled', true);
        $app['config']->set('webhooks.queue', true);
        $app['config']->set('webhooks.logging.enabled', true);
    }

    protected function defineDatabaseMigrations(): void
    {
        $migrationsPath = __DIR__.'/../vendor/jeffersongoncalves/laravel-webhooks/database/migrations';

        if (! is_dir($migrationsPath)) {
            return;
        }

        $stubs = glob($migrationsPath.'/*.php.stub') ?: [];

        foreach ($stubs as $stub) {
            $migrationFile = $migrationsPath.'/'.basename($stub, '.stub');

            if (! file_exists($migrationFile)) {
                copy($stub, $migrationFile);
            }
        }

        $this->loadMigrationsFrom($migrationsPath);

        $this->beforeApplicationDestroyed(function () use ($migrationsPath, $stubs) {
            foreach ($stubs as $stub) {
                $migrationFile = $migrationsPath.'/'.basename($stub, '.stub');

                if (file_exists($migrationFile)) {
                    unlink($migrationFile);
                }
            }
        });
    }
}
