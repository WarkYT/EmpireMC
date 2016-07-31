<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Aide de vue : Extraction du nom du contrôleur en cours.
 */
class ControllerName extends AbstractHelper {

    /**
     * Invoquer l'aide de vue.
     * 
     * @return string Le nom du contrôleur
     */
    public function __invoke() {

        $application = $this->getView()
                        ->getHelperPluginManager()
                        ->getServiceLocator()->get('Application');

        $filter = new \Zend\Filter\Word\CamelCaseToDash();
        $route = $application->getMvcEvent()->getRouteMatch();

        if ($route === null) {
            return 'index';
        }

        return strtolower($filter->filter(substr(strrchr($route->getParam('controller'), '\\'), 1)));
    }

}
