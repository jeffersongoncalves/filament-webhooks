<?php

return [
    'navigation_label' => 'Webhooks',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhooks',
    'form' => [
        'section_endpoint' => 'Endpunkt',
        'section_events' => 'Ereignisse',
        'name' => 'Name',
        'url' => 'URL',
        'secret' => 'Secret',
        'secret_helper' => 'Wird zum Signieren der Nutzdaten verwendet. Leer lassen, um unsignierte Anfragen zu senden.',
        'generate_secret' => 'Secret generieren',
        'model' => 'Modell',
        'model_helper' => 'Vollqualifizierte Modellklasse, auf die dieser Webhook beschränkt wird. Leer lassen, um auf alle Modelle zu hören.',
        'events' => 'Ereignisse',
        'is_active' => 'Aktiv',
    ],
    'table' => [
        'name' => 'Name',
        'url' => 'URL',
        'events' => 'Ereignisse',
        'is_active' => 'Aktiv',
        'created_at' => 'Erstellt am',
    ],
    'actions' => [
        'test' => [
            'label' => 'Testen',
            'success' => 'Der Test-Webhook wurde erfolgreich zugestellt.',
            'failed' => 'Der Test-Webhook konnte nicht zugestellt werden.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Zustellprotokolle',
            'success' => 'Erfolg',
            'event' => 'Ereignis',
            'response_code' => 'Antwortcode',
            'error_message' => 'Fehler',
            'attempt' => 'Versuch',
            'created_at' => 'Erstellt am',
        ],
    ],
];
