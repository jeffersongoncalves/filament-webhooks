<?php

return [
    'navigation_label' => 'Webhook-lar',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhook-lar',
    'form' => [
        'section_endpoint' => 'Endpoint',
        'section_events' => 'Hadisələr',
        'name' => 'Ad',
        'url' => 'URL',
        'secret' => 'Gizli açar',
        'secret_helper' => 'Məlumatı imzalamaq üçün istifadə olunur. İmzasız sorğular göndərmək üçün boş buraxın.',
        'generate_secret' => 'Gizli açar yarat',
        'model' => 'Model',
        'model_helper' => 'Bu webhook-u məhdudlaşdırmaq üçün tam model sinfi. Bütün modelləri dinləmək üçün boş buraxın.',
        'events' => 'Hadisələr',
        'is_active' => 'Aktiv',
    ],
    'table' => [
        'name' => 'Ad',
        'url' => 'URL',
        'events' => 'Hadisələr',
        'is_active' => 'Aktiv',
        'created_at' => 'Yaradılma tarixi',
    ],
    'actions' => [
        'test' => [
            'label' => 'Test',
            'success' => 'Test webhook-u uğurla çatdırıldı.',
            'failed' => 'Test webhook-u çatdırıla bilmədi.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Çatdırılma jurnalları',
            'success' => 'Uğurlu',
            'event' => 'Hadisə',
            'response_code' => 'Cavab kodu',
            'error_message' => 'Xəta',
            'attempt' => 'Cəhd',
            'created_at' => 'Yaradılma tarixi',
        ],
    ],
];
