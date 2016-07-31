<?php

return [
    'routes' => [
        'home' => [
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => [
                'route' => '/',
                'defaults' => [
                    'controller' => 'Application\Controller\Index',
                    'action' => 'index',
                ],
            ],
        ],
        // The following is a route to simplify getting started creating
        // new controllers and actions without needing to create a new
        // module. Simply drop new controllers in, and you can access them
        // using the path /application/:controller/:action
        'application' => [
            'type' => 'segment',
            'options' => [
                'route' => '/[:module][/:controller][/:action][/:id][/:type]',
                'constraints' => [
                    'module' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    'id' => '[a-zA-Z0-9_-]+',
                    'type' => '[a-zA-Z0-9_+-]+',
                ],
                'defaults' => [
                    '__NAMESPACE__' => 'Application\Controller',
                    'module' => 'application',
                    'controller' => 'Index',
                    'action' => 'index',
                ],
            ],
            'may_terminate' => true,
            'child_routes' => [
                'default' => [
                    'type' => 'wildcard',
                    'options' => [
                    ],
                ],
            ],
        ],
    ],
];
