<?php

return [
    'navigation_label' => 'وب‌هوک‌ها',
    'model_label' => 'وب‌هوک',
    'plural_model_label' => 'وب‌هوک‌ها',
    'form' => [
        'section_endpoint' => 'نقطه پایانی',
        'section_events' => 'رویدادها',
        'name' => 'نام',
        'url' => 'URL',
        'secret' => 'کلید مخفی',
        'secret_helper' => 'برای امضای داده‌ها استفاده می‌شود. برای ارسال درخواست‌های بدون امضا خالی بگذارید.',
        'generate_secret' => 'ایجاد کلید مخفی',
        'model' => 'مدل',
        'model_helper' => 'کلاس کامل مدل برای محدود کردن این وب‌هوک. برای گوش دادن به همه مدل‌ها خالی بگذارید.',
        'events' => 'رویدادها',
        'is_active' => 'فعال',
    ],
    'table' => [
        'name' => 'نام',
        'url' => 'URL',
        'events' => 'رویدادها',
        'is_active' => 'فعال',
        'created_at' => 'تاریخ ایجاد',
    ],
    'actions' => [
        'test' => [
            'label' => 'آزمایش',
            'success' => 'وب‌هوک آزمایشی با موفقیت تحویل داده شد.',
            'failed' => 'تحویل وب‌هوک آزمایشی ناموفق بود.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'گزارش‌های تحویل',
            'success' => 'موفق',
            'event' => 'رویداد',
            'response_code' => 'کد پاسخ',
            'error_message' => 'خطا',
            'attempt' => 'تلاش',
            'created_at' => 'تاریخ ایجاد',
        ],
    ],
];
