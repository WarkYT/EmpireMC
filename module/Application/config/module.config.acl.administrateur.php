<?php

return [
    'Application\Controller\Auth' => [
        'logout', 'messages', 'deny',
        'deny' => [
            'login', 'process'
        ]
    ],
    'Application\Controller\Index' => ['all'],
];
