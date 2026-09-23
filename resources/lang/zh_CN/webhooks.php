<?php

return [
    'navigation_label' => 'Webhooks',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhooks',
    'form' => [
        'section_endpoint' => '端点',
        'section_events' => '事件',
        'name' => '名称',
        'url' => 'URL',
        'secret' => '密钥',
        'secret_helper' => '用于对负载签名。留空则发送未签名的请求。',
        'generate_secret' => '生成密钥',
        'model' => '模型',
        'model_helper' => '用于限定此 Webhook 的完整模型类名。留空则监听所有模型。',
        'events' => '事件',
        'is_active' => '启用',
    ],
    'table' => [
        'name' => '名称',
        'url' => 'URL',
        'events' => '事件',
        'is_active' => '启用',
        'created_at' => '创建时间',
    ],
    'actions' => [
        'test' => [
            'label' => '测试',
            'success' => '测试 Webhook 已成功送达。',
            'failed' => '测试 Webhook 送达失败。',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => '投递日志',
            'success' => '成功',
            'event' => '事件',
            'response_code' => '响应代码',
            'error_message' => '错误',
            'attempt' => '尝试次数',
            'created_at' => '创建时间',
        ],
    ],
];
