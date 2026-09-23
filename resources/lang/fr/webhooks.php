<?php

return [
    'navigation_label' => 'Webhooks',
    'model_label' => 'Webhook',
    'plural_model_label' => 'Webhooks',
    'form' => [
        'section_endpoint' => 'Point de terminaison',
        'section_events' => 'Événements',
        'name' => 'Nom',
        'url' => 'URL',
        'secret' => 'Secret',
        'secret_helper' => 'Utilisé pour signer le contenu. Laissez vide pour envoyer des requêtes non signées.',
        'generate_secret' => 'Générer un secret',
        'model' => 'Modèle',
        'model_helper' => 'Classe de modèle pleinement qualifiée à laquelle limiter ce webhook. Laissez vide pour écouter tous les modèles.',
        'events' => 'Événements',
        'is_active' => 'Actif',
    ],
    'table' => [
        'name' => 'Nom',
        'url' => 'URL',
        'events' => 'Événements',
        'is_active' => 'Actif',
        'created_at' => 'Créé le',
    ],
    'actions' => [
        'test' => [
            'label' => 'Tester',
            'success' => 'Le webhook de test a été livré avec succès.',
            'failed' => 'La livraison du webhook de test a échoué.',
        ],
    ],
    'relation_managers' => [
        'logs' => [
            'title' => 'Journaux de livraison',
            'success' => 'Succès',
            'event' => 'Événement',
            'response_code' => 'Code de réponse',
            'error_message' => 'Erreur',
            'attempt' => 'Tentative',
            'created_at' => 'Créé le',
        ],
    ],
];
