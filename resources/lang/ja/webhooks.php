<?php

return [
    'navigation_label' => 'Webhook',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhook',
    'form' => [
        'section_endpoint' => 'エンドポイント',
        'section_events' => 'イベント',
        'name' => '名前',
        'url' => 'URL',
        'secret' => 'シークレット',
        'secret_helper' => 'ペイロードの署名に使用します。署名なしで送信する場合は空のままにしてください。',
        'generate_secret' => 'シークレットを生成',
        'model' => 'モデル',
        'model_helper' => 'この Webhook の対象とする完全修飾モデルクラス。すべてのモデルを対象にする場合は空のままにしてください。',
        'events' => 'イベント',
        'is_active' => '有効',
    ],
    'table' => [
        'name' => '名前',
        'url' => 'URL',
        'events' => 'イベント',
        'is_active' => '有効',
        'created_at' => '作成日時',
    ],
    'actions' => [
        'test' => [
            'label' => 'テスト',
            'success' => 'テスト Webhook を正常に配信しました。',
            'failed' => 'テスト Webhook の配信に失敗しました。',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => '配信ログ',
            'success' => '成功',
            'event' => 'イベント',
            'response_code' => 'レスポンスコード',
            'error_message' => 'エラー',
            'attempt' => '試行回数',
            'created_at' => '作成日時',
        ],
    ],
];
