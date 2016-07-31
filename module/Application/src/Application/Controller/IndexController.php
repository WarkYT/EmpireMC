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
    
    public function testAction() {
        
        return new ViewModel();
    }

}
