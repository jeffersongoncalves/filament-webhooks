<?php

return [
    'navigation_label' => 'Webhook',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhook',
    'form' => [
        'section_endpoint' => 'Endpoint',
        'section_events' => 'Eventi',
        'name' => 'Nome',
        'url' => 'URL',
        'secret' => 'Segreto',
        'secret_helper' => 'Usato per firmare il payload. Lascia vuoto per inviare richieste non firmate.',
        'generate_secret' => 'Genera segreto',
        'model' => 'Modello',
        'model_helper' => 'Classe del modello completamente qualificata a cui limitare questo webhook. Lascia vuoto per ascoltare tutti i modelli.',
        'events' => 'Eventi',
        'is_active' => 'Attivo',
    ],
    'table' => [
        'name' => 'Nome',
        'url' => 'URL',
        'events' => 'Eventi',
        'is_active' => 'Attivo',
        'created_at' => 'Creato il',
    ],
    'actions' => [
        'test' => [
            'label' => 'Testa',
            'success' => 'Il webhook di test è stato consegnato correttamente.',
            'failed' => 'Consegna del webhook di test non riuscita.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Log di consegna',
            'success' => 'Successo',
            'event' => 'Evento',
            'response_code' => 'Codice di risposta',
            'error_message' => 'Errore',
            'attempt' => 'Tentativo',
            'created_at' => 'Creato il',
        ],
    ],
];
