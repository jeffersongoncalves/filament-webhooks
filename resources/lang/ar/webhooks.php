<?php

return [
    'navigation_label' => 'Webhooks',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhooks',
    'form' => [
        'section_endpoint' => 'نقطة النهاية',
        'section_events' => 'الأحداث',
        'name' => 'الاسم',
        'url' => 'الرابط',
        'secret' => 'المفتاح السري',
        'secret_helper' => 'يُستخدم لتوقيع الحمولة. اتركه فارغًا لإرسال طلبات غير موقعة.',
        'generate_secret' => 'إنشاء مفتاح سري',
        'model' => 'النموذج',
        'model_helper' => 'فئة النموذج المؤهلة بالكامل لتقييد هذا الـ webhook. اتركه فارغًا للاستماع إلى جميع النماذج.',
        'events' => 'الأحداث',
        'is_active' => 'نشط',
    ],
    'table' => [
        'name' => 'الاسم',
        'url' => 'الرابط',
        'events' => 'الأحداث',
        'is_active' => 'نشط',
        'created_at' => 'تاريخ الإنشاء',
    ],
    'actions' => [
        'test' => [
            'label' => 'اختبار',
            'success' => 'تم تسليم webhook الاختبار بنجاح.',
            'failed' => 'فشل تسليم webhook الاختبار.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'سجلات التسليم',
            'success' => 'نجاح',
            'event' => 'الحدث',
            'response_code' => 'رمز الاستجابة',
            'error_message' => 'الخطأ',
            'attempt' => 'المحاولة',
            'created_at' => 'تاريخ الإنشاء',
        ],
    ],
];
