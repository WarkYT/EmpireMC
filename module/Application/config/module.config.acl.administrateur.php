<?php

return [
    'Application\Controller\Article' => ['all'],
    'Application\Controller\Auth' => [
        'logout', 'messages', 'deny',
        'deny' => [
            'login', 'process'
        ]
    ],
    'Application\Controller\Index' => ['all'],
    'Application\Controller\Joueur' => ['all'],
    'Application\Controller\Manage' => ['all'],
    'Application\Controller\Plugin' => ['all'],
    'Application\Controller\Shop' => ['all'],
];
