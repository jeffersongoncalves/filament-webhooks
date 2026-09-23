<?php

return [
    'navigation_label' => 'Webhooklar',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhooklar',
    'form' => [
        'section_endpoint' => 'Endpoint',
        'section_events' => 'Hodisalar',
        'name' => 'Nomi',
        'url' => 'URL',
        'secret' => 'Maxfiy kalit',
        'secret_helper' => 'Maʼlumotlarni imzolash uchun ishlatiladi. Imzosiz soʻrovlar yuborish uchun boʻsh qoldiring.',
        'generate_secret' => 'Maxfiy kalit yaratish',
        'model' => 'Model',
        'model_helper' => 'Ushbu webhookni cheklash uchun toʻliq model klassi. Barcha modellarni tinglash uchun boʻsh qoldiring.',
        'events' => 'Hodisalar',
        'is_active' => 'Faol',
    ],
    'table' => [
        'name' => 'Nomi',
        'url' => 'URL',
        'events' => 'Hodisalar',
        'is_active' => 'Faol',
        'created_at' => 'Yaratilgan',
    ],
    'actions' => [
        'test' => [
            'label' => 'Sinash',
            'success' => 'Test webhooki muvaffaqiyatli yetkazildi.',
            'failed' => 'Test webhookini yetkazib boʻlmadi.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Yetkazish jurnallari',
            'success' => 'Muvaffaqiyatli',
            'event' => 'Hodisa',
            'response_code' => 'Javob kodi',
            'error_message' => 'Xato',
            'attempt' => 'Urinish',
            'created_at' => 'Yaratilgan',
        ],
    ],
];
