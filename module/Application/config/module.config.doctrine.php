<?php

return [
    'driver' => [
        'application_entities' => [
            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
            'cache' => 'array',
            'paths' => [__DIR__ . '/../src/Application/Domain/Entity']
        ],
        'orm_default' => [
            'drivers' => [
                'Application\Domain\Entity' => 'application_entities'
            ],
        ],
    ],
    'authentication' => [
        'orm_default' => [
            'object_manager' => 'Doctrine\ORM\EntityManager',
            'identity_class' => 'Application\Domain\Entity\Joueur',
            'identity_property' => 'pseudo',
            'credential_property' => 'password'
        ],
    ],
];
