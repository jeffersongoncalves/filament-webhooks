<?php

return [
    'navigation_label' => 'Вебхуки',
    'model_label' => 'Вебхук',
    'plural_model_label' => 'Вебхуки',
    'form' => [
        'section_endpoint' => 'Ендпоінт',
        'section_events' => 'Події',
        'name' => 'Назва',
        'url' => 'URL',
        'secret' => 'Секрет',
        'secret_helper' => 'Використовується для підпису даних. Залиште порожнім, щоб надсилати непідписані запити.',
        'generate_secret' => 'Згенерувати секрет',
        'model' => 'Модель',
        'model_helper' => 'Повне ім\'я класу моделі, якою обмежено цей вебхук. Залиште порожнім, щоб відстежувати всі моделі.',
        'events' => 'Події',
        'is_active' => 'Активний',
    ],
    'table' => [
        'name' => 'Назва',
        'url' => 'URL',
        'events' => 'Події',
        'is_active' => 'Активний',
        'created_at' => 'Створено',
    ],
    'actions' => [
        'test' => [
            'label' => 'Тест',
            'success' => 'Тестовий вебхук успішно доставлено.',
            'failed' => 'Не вдалося доставити тестовий вебхук.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Журнал доставки',
            'success' => 'Успіх',
            'event' => 'Подія',
            'response_code' => 'Код відповіді',
            'error_message' => 'Помилка',
            'attempt' => 'Спроба',
            'created_at' => 'Створено',
        ],
    ],
];
