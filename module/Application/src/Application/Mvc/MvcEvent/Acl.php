<?php

/**
 * File for handling Access Control List
 *
 * @category   Application
 * @package    Application\Mvc
 * @subpackage Application\Mvc\MvcEvent
 * @copyright  Copyright (c) 2014, Titane Support
 * @license    http://www.wtfpl.net WTFPL
 */
/**
 * @namespace Application\Mvc\MvcEvent
 */

namespace Application\Mvc\MvcEvent;

/**
 * @uses Application\Permissions\Acl
 * @uses Zend\Permissions\Acl\Role\GenericRole
 * @uses Zend\Mvc\MvcEvent
 */
use Application\Permissions\Acl as ZendAcl;
use Zend\Mvc\MvcEvent;
use Zend\Permissions\Acl\Role\GenericRole;
use Zend\View\Helper\Navigation;
/**
 * Class for handling Access Control List
 *
 * @property string RESTRICTED_AUTH
 * @property string RESTRICTED_AREA
 * @property string DEFAULT_ROLE
 * 
 * @category   Application
 * @package    Application\Mvc
 * @subpackage Application\Mvc\MvcEvent
 * @copyright  Copyright (c) 2014, Titane Support
 * @license    http://www.wtfpl.net WTFPL
 */
class Acl {

    /**
     * @var string
     */
    const RESTRICTED_AUTH = '/application/auth/login';

    /**
     * @var string
     */
    const RESTRICTED_AREA = '/application/auth/deny';

    /**
     * @var string
     */
    const DEFAULT_ROLE = ZendAcl::DEFAULT_ROLE_NAME;

    /**
     * preDispatch Event Handler
     *
     * @param \Zend\Mvc\MvcEvent $event
     * @throws \Exception
     */
    public static function onDispatch(MvcEvent $event) {

        static::allowed($event, static::hasIdentity($event));
    }

    /**
     * Returns the user role.
     * 
     * @param MvcEvent $event
     * @return GenericRole The user role
     */
    private static function hasIdentity(MvcEvent $event) {

        $authService = $event->getApplication()->getServiceManager()
                ->get('Zend\Authentication\AuthenticationService');

        $roleAsString = self::DEFAULT_ROLE;

        if ($authService->hasIdentity() && $authService->getIdentity()->getRole() !== null) {
            $roleAsString = $authService->getIdentity()->getRole();
        }

        return new GenericRole($roleAsString);
    }

    /**
     * 
     * @param MvcEvent $event
     * @param GenericRole $role The user role
     * @throws \Exception
     */
    private static function allowed(MvcEvent $event, $role) {

        $acl = $event->getViewModel()->acl;

        Navigation::setDefaultAcl($acl);
        Navigation::setDefaultRole($role);

        $controller = $event->getRouteMatch()->getParam('controller');

        if (!$acl->hasResource($controller)) {
            throw new \Exception('No valid resource defined: ' . $controller);
        }

        $action = $event->getRouteMatch()->getParam('action');
        if (!$acl->isAllowed($role, $controller, $action)) {
            $response = $event->getResponse();
            $response->setStatusCode(302);

            if ($controller === 'Application\Controller\News' && $action === 'display') {
                $response->getHeaders()->addHeaderLine('Location', self::RESTRICTED_AUTH);
            } else {
                $response->getHeaders()->addHeaderLine('Location', self::RESTRICTED_AREA);
            }

            $response->sendHeaders();
            $event->stopPropagation();
        }
    }

}
