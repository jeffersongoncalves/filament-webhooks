<?php

return [
    'navigation_label' => 'Webhooki',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhooki',
    'form' => [
        'section_endpoint' => 'Endpoint',
        'section_events' => 'Zdarzenia',
        'name' => 'Nazwa',
        'url' => 'URL',
        'secret' => 'Sekret',
        'secret_helper' => 'Służy do podpisywania danych. Pozostaw puste, aby wysyłać niepodpisane żądania.',
        'generate_secret' => 'Wygeneruj sekret',
        'model' => 'Model',
        'model_helper' => 'Pełna nazwa klasy modelu, do której ograniczony jest ten webhook. Pozostaw puste, aby nasłuchiwać wszystkich modeli.',
        'events' => 'Zdarzenia',
        'is_active' => 'Aktywny',
    ],
    'table' => [
        'name' => 'Nazwa',
        'url' => 'URL',
        'events' => 'Zdarzenia',
        'is_active' => 'Aktywny',
        'created_at' => 'Utworzono',
    ],
    'actions' => [
        'test' => [
            'label' => 'Testuj',
            'success' => 'Testowy webhook został dostarczony.',
            'failed' => 'Nie udało się dostarczyć testowego webhooka.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Logi dostarczeń',
            'success' => 'Sukces',
            'event' => 'Zdarzenie',
            'response_code' => 'Kod odpowiedzi',
            'error_message' => 'Błąd',
            'attempt' => 'Próba',
            'created_at' => 'Utworzono',
        ],
    ],
];
