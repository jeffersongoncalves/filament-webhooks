<?php

return [
    'navigation_label' => 'Webhooks',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhooks',
    'form' => [
        'section_endpoint' => 'Endpoint',
        'section_events' => 'Gebeurtenissen',
        'name' => 'Naam',
        'url' => 'URL',
        'secret' => 'Geheim',
        'secret_helper' => 'Wordt gebruikt om de payload te ondertekenen. Laat leeg om niet-ondertekende verzoeken te verzenden.',
        'generate_secret' => 'Geheim genereren',
        'model' => 'Model',
        'model_helper' => 'Volledig gekwalificeerde modelklasse waartoe deze webhook beperkt wordt. Laat leeg om naar alle modellen te luisteren.',
        'events' => 'Gebeurtenissen',
        'is_active' => 'Actief',
    ],
    'table' => [
        'name' => 'Naam',
        'url' => 'URL',
        'events' => 'Gebeurtenissen',
        'is_active' => 'Actief',
        'created_at' => 'Aangemaakt op',
    ],
    'actions' => [
        'test' => [
            'label' => 'Testen',
            'success' => 'De testwebhook is succesvol afgeleverd.',
            'failed' => 'De testwebhook kon niet worden afgeleverd.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Afleveringslogs',
            'success' => 'Geslaagd',
            'event' => 'Gebeurtenis',
            'response_code' => 'Responscode',
            'error_message' => 'Fout',
            'attempt' => 'Poging',
            'created_at' => 'Aangemaakt op',
        ],
    ],
];
