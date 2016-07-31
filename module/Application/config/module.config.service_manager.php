<?php

return [
    'abstract_factories' => [
        'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        'Zend\Log\LoggerAbstractServiceFactory',
    ],
    'factories' => [
        'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        'Zend\Authentication\AuthenticationService' => function($serviceManager) {
            return $serviceManager->get('doctrine.authenticationservice.orm_default');
        }
    ],
    'aliases' => [
        'translator' => 'MvcTranslator',
    ],
];
