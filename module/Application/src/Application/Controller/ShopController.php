<?php

/**
 * Contrôleur Boutique.
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
 * Contrôleur Boutique.
 *
 * @category   Application
 * @package    Application\Controller
 * @copyright  Copyright (c) 2015, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
class ShopController extends AbstractActionController {

    public function indexAction() {
        
        $articleRepository = $this->locateRepository('Application\Domain\Entity\Article');
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('articles', $articleRepository->findAll());

        return $viewModel;
    }

}
