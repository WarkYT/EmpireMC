<?php

return [
    'Application\Controller\Article' => [],
    'Application\Controller\Auth' => [
        'logout', 'messages', 'deny',
        'deny' => [
            'register', 'process', 'login', 'logon'
        ]
    ],
    'Application\Controller\Index' => ['all'],
    'Application\Controller\Joueur' => [],
    'Application\Controller\Plugin' => ['all'],
    'Application\Controller\Shop' => ['all'],
];