<div class="filament-hidden">

![Filament Webhooks](https://raw.githubusercontent.com/jeffersongoncalves/filament-webhooks/1.x/art/jeffersongoncalves-filament-webhooks.png)

</div>

# Filament Webhooks
[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-webhooks.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-webhooks)[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-webhooks/tests.yml?branch=1.x&label=tests&style=flat-square)](https://github.com/jeffersongoncalves/filament-webhooks/actions?query=workflow%3Atests+branch%3A1.x)[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-webhooks/fix-php-code-style-issues.yml?branch=1.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-webhooks/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A1.x)[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-webhooks.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-webhooks)[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-webhooks.svg?style=flat-square)](LICENSE.md)

A Filament v3 panel UI for [jeffersongoncalves/laravel-webhooks](https://github.com/jeffersongoncalves/laravel-webhooks). Manage outgoing webhook endpoints, choose which model events they listen to, send test deliveries, and inspect delivery logs — all from your Filament panel.

This package is purely the **UI layer**. All the heavy lifting (dispatching, signing, queueing, logging, and the `SendsWebhooks` model traits) lives in the framework-agnostic core package [jeffersongoncalves/laravel-webhooks](https://github.com/jeffersongoncalves/laravel-webhooks). Install and configure the core package to make your Eloquent models emit webhooks; install this package to manage them visually.

## Compatibility

| Version | Branch | Filament | PHP | Laravel |
|---------|--------|----------|-----|---------|
| 1.x | `1.x` | ^3.0 | ^8.1 | ^10.0 \| ^11.0 \| ^12.0 |
| 2.x | `2.x` | ^4.0 | ^8.2 | ^11.0 |
| 3.x | `3.x` | ^5.0 | ^8.2 | ^11.0 \| ^12.0 |

## Installation

Install the package via Composer:

```bash
composer require jeffersongoncalves/filament-webhooks:"^1.0"
```

The core package [`jeffersongoncalves/laravel-webhooks`](https://github.com/jeffersongoncalves/laravel-webhooks) is pulled in automatically. Publish and run its migrations so the `webhooks` and `webhook_logs` tables exist:

```bash
php artisan vendor:publish --tag="laravel-webhooks-migrations"
php artisan vendor:publish --tag="laravel-webhooks-config"
php artisan migrate
```

Optionally publish this plugin's configuration:

```bash
php artisan vendor:publish --tag="filament-webhooks-config"
```

## Usage

Register the plugin on any Filament panel:

```php
use Filament\Panel;
use JeffersonGoncalves\FilamentWebhooks\FilamentWebhooksPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentWebhooksPlugin::make(),
        ]);
}
```

This registers a **Webhooks** resource in the panel that lets you:

- **Create / edit webhook endpoints** — name, URL, optional signing secret (with a one-click random generator), an optional model class to scope deliveries, the model events to listen to (Created / Updated / Deleted), and an active toggle.
- **Browse and filter** — search by name and URL, filter by active state and event, and copy URLs straight from the table.
- **Send a test delivery** — the *Test* row/header action calls `Webhooks::test()` from the core package and notifies you whether the call succeeded or failed.
- **Inspect delivery logs** — a read-only *Delivery Logs* relation manager shows each attempt's event, success state, response code, error message, and timestamp.

### Making your models emit webhooks

That part is handled entirely by the core package. Add the `SendsWebhooks` trait (and optionally `ShouldQueueWebhook`, `CreatedWebhook`, `UpdatedWebhook`, `DeletedWebhook`, `AllWebhooks`) to your Eloquent models as documented in [jeffersongoncalves/laravel-webhooks](https://github.com/jeffersongoncalves/laravel-webhooks). This Filament plugin only manages the `Webhook` records those traits read from.

## Configuration

`config/filament-webhooks.php` controls how the resource appears in the panel:

```php
return [
    'navigation' => [
        'group' => null,           // navigation group label
        'sort' => null,            // navigation sort order
        'icon' => 'heroicon-o-bolt',
    ],
];
```

The webhook behaviour itself (queue, logging, table/model overrides) is configured in the core package's `config/webhooks.php`.

## Localization

Translations are provided for English (`en`) and Brazilian Portuguese (`pt_BR`). Publish them to customize:

```bash
php artisan vendor:publish --tag="filament-webhooks-translations"
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- Inspired by [dniccum/nova-webhooks](https://github.com/dniccum/nova-webhooks)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
