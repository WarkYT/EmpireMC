<?php

return [
    'default' => [
        [
            'label' => 'Accueil',
            'route' => 'home',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'index',
        ],
        [
            'id' => 'empiremc',
            'label' => 'Empire MC',
            'uri' => '#',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'empiremc',
            'pages' => [
                [
                    'id' => 'information',
                    'label' => 'Information',
                    'uri' => '/application/index/information',
                    'resource' => 'Application\Controller\Index',
                    'privilege' => 'information'
                ],
                [
                    'label' => "team",
                    'label' => "The team",
                    'uri' => '/application/index/equipe',
                    'resource' => 'Application\Controller\Index',
                    'privilege' => 'team'
                ],
            ],
        ],
        [
            'id' => 'vote',
            'label' => 'Vote',
            'uri' => '/application/index/vote',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'vote'
        ],
        [
            'id' => 'vote1',
            'label' => 'Vote1',
            'uri' => '/application/index/vote1',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'index'
        ],
        [
            'id' => 'shop',
            'label' => 'Shop',
            'uri' => '/application/index/shop',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'shop'
        ],
        [
            'id' => 'ranking',
            'label' => 'Ranking',
            'uri' => '/application/index/ranking',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'ranking'
        ],
        [
            'id' => 'forum',
            'label' => 'Forum',
            'uri' => '/application/index/forum',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'forum'
        ],
        [
            'id' => 'plugins',
            'label' => 'Our Plugins',
            'uri' => '/application/index/plugins',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'plugins'
        ],
        [
            'id' => 'login',
            'label' => 'Login',
            'uri' => '/application/auth/login',
            'resource' => 'Application\Controller\Auth',
            'privilege' => 'login'
        ],
        [
            'id' => 'register',
            'label' => 'Register',
            'uri' => '/application/auth/register',
            'resource' => 'Application\Controller\Auth',
            'privilege' => 'register'
        ],
        [
            'id' => 'administration',
            'label' => 'Administration',
            'uri' => '/application/gestion',
            'resource' => 'Application\Controller\Gestion',
            'privilege' => 'index',
            'pages' => [
                [
                    'id' => 'players',
                    'label' => 'Consult players',
                    'uri' => '/application/gestion/players',
                    'resource' => 'Application\Controller\Gestion',
                    'privilege' => 'players'
                ],
            ],
        ],
        [
            'id' => 'logout',
            'label' => 'Logout',
            'uri' => '/application/auth/logout',
            'resource' => 'Application\Controller\Auth',
            'privilege' => 'logout'
        ],
    ],
];
