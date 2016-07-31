<?php

/**
 * Contrôleur Plugin.
 *
 * @category   Application
 * @package    Application\Controller
 * @copyright  Copyright (c) 2016, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */

namespace Application\Controller;

use Application\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Contrôleur Plugin.
 *
 * @category   Application
 * @package    Application\Controller
 * @copyright  Copyright (c) 2015, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
class PluginController extends AbstractActionController {

    public function indexAction() {
        
        $pluginRepository = $this->locateRepository('Application\Domain\Entity\Plugin');
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('plugins', $pluginRepository->findAll());

        return $viewModel;
    }
    
    public function editAction() {
        
        return new ViewModel();
    }
    
    public function deleteAction() {
        
        return new ViewModel();
    }

}
