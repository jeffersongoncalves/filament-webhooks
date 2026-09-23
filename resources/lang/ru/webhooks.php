<?php

return [
    'navigation_label' => 'Вебхуки',
    'model_label' => 'Вебхук',
    'plural_model_label' => 'Вебхуки',
    'form' => [
        'section_endpoint' => 'Эндпоинт',
        'section_events' => 'События',
        'name' => 'Название',
        'url' => 'URL',
        'secret' => 'Секрет',
        'secret_helper' => 'Используется для подписи данных. Оставьте пустым, чтобы отправлять неподписанные запросы.',
        'generate_secret' => 'Сгенерировать секрет',
        'model' => 'Модель',
        'model_helper' => 'Полное имя класса модели, которой ограничен этот вебхук. Оставьте пустым, чтобы отслеживать все модели.',
        'events' => 'События',
        'is_active' => 'Активен',
    ],
    'table' => [
        'name' => 'Название',
        'url' => 'URL',
        'events' => 'События',
        'is_active' => 'Активен',
        'created_at' => 'Создан',
    ],
    'actions' => [
        'test' => [
            'label' => 'Тест',
            'success' => 'Тестовый вебхук успешно доставлен.',
            'failed' => 'Не удалось доставить тестовый вебхук.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Журнал доставки',
            'success' => 'Успех',
            'event' => 'Событие',
            'response_code' => 'Код ответа',
            'error_message' => 'Ошибка',
            'attempt' => 'Попытка',
            'created_at' => 'Создано',
        ],
    ],
];
