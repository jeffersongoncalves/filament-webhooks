<?php

return [
    'navigation_label' => 'Webhooks',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhooks',
    'form' => [
        'section_endpoint' => 'Endpoint',
        'section_events' => 'Eventos',
        'name' => 'Nombre',
        'url' => 'URL',
        'secret' => 'Secreto',
        'secret_helper' => 'Se usa para firmar el payload. Déjalo vacío para enviar solicitudes sin firmar.',
        'generate_secret' => 'Generar secreto',
        'model' => 'Modelo',
        'model_helper' => 'Clase de modelo completamente calificada a la que se limita este webhook. Déjalo vacío para escuchar todos los modelos.',
        'events' => 'Eventos',
        'is_active' => 'Activo',
    ],
    'table' => [
        'name' => 'Nombre',
        'url' => 'URL',
        'events' => 'Eventos',
        'is_active' => 'Activo',
        'created_at' => 'Creado el',
    ],
    'actions' => [
        'test' => [
            'label' => 'Probar',
            'success' => 'El webhook de prueba se entregó correctamente.',
            'failed' => 'No se pudo entregar el webhook de prueba.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Registros de entrega',
            'success' => 'Éxito',
            'event' => 'Evento',
            'response_code' => 'Código de respuesta',
            'error_message' => 'Error',
            'attempt' => 'Intento',
            'created_at' => 'Creado el',
        ],
    ],
];
