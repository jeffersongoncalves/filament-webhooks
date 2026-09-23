<?php

return [
    'navigation_label' => 'Webhook\'lar',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhook\'lar',
    'form' => [
        'section_endpoint' => 'Uç nokta',
        'section_events' => 'Olaylar',
        'name' => 'Ad',
        'url' => 'URL',
        'secret' => 'Gizli anahtar',
        'secret_helper' => 'Yükü imzalamak için kullanılır. İmzasız istek göndermek için boş bırakın.',
        'generate_secret' => 'Gizli anahtar oluştur',
        'model' => 'Model',
        'model_helper' => 'Bu webhook\'u sınırlamak için tam nitelikli model sınıfı. Tüm modelleri dinlemek için boş bırakın.',
        'events' => 'Olaylar',
        'is_active' => 'Aktif',
    ],
    'table' => [
        'name' => 'Ad',
        'url' => 'URL',
        'events' => 'Olaylar',
        'is_active' => 'Aktif',
        'created_at' => 'Oluşturulma tarihi',
    ],
    'actions' => [
        'test' => [
            'label' => 'Test et',
            'success' => 'Test webhook\'u başarıyla teslim edildi.',
            'failed' => 'Test webhook\'u teslim edilemedi.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Teslim kayıtları',
            'success' => 'Başarılı',
            'event' => 'Olay',
            'response_code' => 'Yanıt kodu',
            'error_message' => 'Hata',
            'attempt' => 'Deneme',
            'created_at' => 'Oluşturulma tarihi',
        ],
    ],
];
