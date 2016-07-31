<?php

/**
 * Contrôleur Manage.
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
 * Contrôleur Manage.
 *
 * @category   Application
 * @package    Application\Controller
 * @copyright  Copyright (c) 2015, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
class ManageController extends AbstractActionController {

    public function indexAction() {
        
        return new ViewModel();
    }
    
    public function playersAction() {
        
        $joueurRepository = $this->locateRepository('Application\Domain\Entity\Joueur');
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('players', $joueurRepository->findAll(0, 10));
        
        return $viewModel;
    }
    
    public function articlesAction() {
        
        return new ViewModel();
    }
    
    public function pluginsAction() {
        
        return new ViewModel();
    }

}
