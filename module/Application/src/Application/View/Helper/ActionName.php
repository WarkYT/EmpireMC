<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Aide de vue : Extraction du nom de l'action en cours.
 */
class ActionName extends AbstractHelper {

    /**
     * Invoquer l'aide de vue.
     * 
     * @return string Le nom de l'action
     */
    public function __invoke() {
        $application = $this->getView()
                        ->getHelperPluginManager()
                        ->getServiceLocator()->get('Application');

        $route = $application->getMvcEvent()->getRouteMatch();

        if ($route === null) {
            return 'index';
        }

        return strtolower($route->getParam('action'));
    }

}
