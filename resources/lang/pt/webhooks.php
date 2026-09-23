<?php

return [
    'navigation_label' => 'Webhooks',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhooks',
    'form' => [
        'section_endpoint' => 'Endpoint',
        'section_events' => 'Eventos',
        'name' => 'Nome',
        'url' => 'URL',
        'secret' => 'Segredo',
        'secret_helper' => 'Usado para assinar o payload. Deixe vazio para enviar pedidos não assinados.',
        'generate_secret' => 'Gerar segredo',
        'model' => 'Modelo',
        'model_helper' => 'Classe de modelo totalmente qualificada à qual limitar este webhook. Deixe vazio para escutar todos os modelos.',
        'events' => 'Eventos',
        'is_active' => 'Ativo',
    ],
    'table' => [
        'name' => 'Nome',
        'url' => 'URL',
        'events' => 'Eventos',
        'is_active' => 'Ativo',
        'created_at' => 'Criado em',
    ],
    'actions' => [
        'test' => [
            'label' => 'Testar',
            'success' => 'O webhook de teste foi entregue com sucesso.',
            'failed' => 'Falha ao entregar o webhook de teste.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Registos de entrega',
            'success' => 'Sucesso',
            'event' => 'Evento',
            'response_code' => 'Código de resposta',
            'error_message' => 'Erro',
            'attempt' => 'Tentativa',
            'created_at' => 'Criado em',
        ],
    ],
];
