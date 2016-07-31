<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module {

    public function onBootstrap(MvcEvent $event) {
        $application = $event->getApplication();

        $eventManager = $application->getEventManager();

        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

//        $eventManager->attach($application->getServiceManager()->get('Application\Domain\Listener\Repository'));

        $acl = new Permissions\Acl(include __DIR__ . '/config/module.config.acl.php');
        $event->getViewModel()->acl = $acl;

        $eventManager->attach(MvcEvent::EVENT_ROUTE, array(
            'Application\Mvc\MvcEvent\Acl',
            'onDispatch'
        ));
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}
