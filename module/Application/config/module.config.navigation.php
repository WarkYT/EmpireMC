<?php

return [
    'default' => [
        [
            'id' => 'empiremc',
            'label' => 'Empire MC',
            'route' => 'home',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'index',
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
                    'uri' => '/application/index/team',
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
            'id' => 'shop',
            'label' => 'Our Shop',
            'uri' => '/application/shop/index',
            'resource' => 'Application\Controller\Shop',
            'privilege' => 'index'
        ],
        [
            'id' => 'ranking',
            'label' => 'Ranking',
            'uri' => '/application/index/ranking',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'ranking'
        ],
        [
            'id' => 'plugin',
            'label' => 'Our Plugins',
            'uri' => '/application/plugin/index',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'index'
        ],
        [
            'id' => 'forum',
            'label' => 'Forum',
            'uri' => '/application/index/forum',
            'resource' => 'Application\Controller\Index',
            'privilege' => 'forum'
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
            'id' => 'manage',
            'label' => 'Administration',
            'uri' => '/application/manage/index',
            'resource' => 'Application\Controller\Manage',
            'privilege' => 'index',
            'pages' => [
                [
                    'id' => 'players',
                    'label' => 'Manage Players',
                    'uri' => '/application/manage/players',
                    'resource' => 'Application\Controller\Manage',
                    'privilege' => 'players'
                ],
                [
                    'id' => 'articles',
                    'label' => 'Manage Articles',
                    'uri' => '/application/manage/articles',
                    'resource' => 'Application\Controller\Manage',
                    'privilege' => 'articles'
                ],
                [
                    'id' => 'plugins',
                    'label' => 'Manage Plugins',
                    'uri' => '/application/manage/plugins',
                    'resource' => 'Application\Controller\Manage',
                    'privilege' => 'plugins'
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
