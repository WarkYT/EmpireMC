<?php

/**
 * File helper for checking user role
 *
 * @category   Application
 * @package    Application\View
 * @subpackage Application\View\Helper
 * @copyright  Copyright (c) 2014, Presteus
 * @license    http://www.wtfpl.net WTFPL
 */

/**
 * @namespace Application\View\Helper
 */
namespace Application\View\Helper;

/**
 * @uses Zend\View\Helper\AbstractHelper
 */
use Zend\View\Helper\AbstractHelper;

/**
 * Class helper for checking user role
 *
 * @category   Application
 * @package    Application\View
 * @subpackage Application\View\Helper
 * @copyright  Copyright (c) 2014, Presteus
 * @license    http://www.wtfpl.net WTFPL
 */
class HasRole extends AbstractHelper {

    public function __invoke($role) {
        if ($this->getView()->identity()->getRole() === $role) {
            return true;
        }
        return false;
    }

}
