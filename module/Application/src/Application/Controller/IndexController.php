<?php

/**
 * Contrôleur Index.
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
 * Contrôleur Index.
 *
 * @category   Application
 * @package    Application\Controller
 * @copyright  Copyright (c) 2015, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
class IndexController extends AbstractActionController {

    public function indexAction() {
        
        return new ViewModel();
    }
    
    public function informationAction() {
        
        return new ViewModel();
    }
    
    public function teamAction() {
        
        return new ViewModel();
    }
    
    public function rankingAction() {
        
        return new ViewModel();
    }
    
    public function voteAction() {
        
        return new ViewModel();
    }

}
