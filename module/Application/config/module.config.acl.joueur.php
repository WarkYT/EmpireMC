<?php

return [
    'Application\Controller\Auth' => [
        'logout', 'messages', 'deny',
        'deny' => [
            'register', 'process', 'login', 'logon'
        ]
    ],
    'Application\Controller\Index' => ['all'],
];
