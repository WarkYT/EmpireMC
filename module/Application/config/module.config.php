<?php

/**
 * Zend Framework (http://framework.zend.com/]
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c] 2005-2014 Zend Technologies USA Inc. (http://www.zend.com]
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return [
    'acl' => include 'module.config.acl.php',
    'console' => include 'module.config.console.php',
    'controllers' => [
        'invokables' => include 'module.config.controllers.php'
    ],
    'controller_plugins' => include 'module.config.controller_plugins.php',
    'doctrine' => include 'module.config.doctrine.php',
    'router' => include 'module.config.router.php',
    'navigation' => include 'module.config.navigation.php',
    'service_manager' => include 'module.config.service_manager.php',
    'translator' => include 'module.config.translator.php',
    'view_helpers' => include 'module.config.view_helpers.php',
    'view_manager' => include 'module.config.view_manager.php',
];
