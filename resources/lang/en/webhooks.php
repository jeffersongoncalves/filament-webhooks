<?php

return [

    'navigation_label' => 'Webhooks',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhooks',

    'form' => [
        'section_endpoint' => 'Endpoint',
        'section_events' => 'Events',
        'name' => 'Name',
        'url' => 'URL',
        'secret' => 'Secret',
        'secret_helper' => 'Used to sign the payload. Leave empty to send unsigned requests.',
        'generate_secret' => 'Generate secret',
        'model' => 'Model',
        'model_helper' => 'Fully qualified model class to scope this webhook. Leave empty to listen to all models.',
        'events' => 'Events',
        'is_active' => 'Active',
    ],

    'table' => [
        'name' => 'Name',
        'url' => 'URL',
        'events' => 'Events',
        'is_active' => 'Active',
        'created_at' => 'Created At',
    ],

    'actions' => [
        'test' => [
            'label' => 'Test',
            'success' => 'The test webhook was delivered successfully.',
            'failed' => 'The test webhook failed to deliver.',
        ],
    ],

    'relation_managers' => [
        'logs' => [
            'title' => 'Delivery Logs',
            'success' => 'Success',
            'event' => 'Event',
            'response_code' => 'Response Code',
            'error_message' => 'Error',
            'attempt' => 'Attempt',
            'created_at' => 'Created At',
        ],
    ],

];
