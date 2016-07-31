<?php

/**
 * Base d'entité.
 *
 * @category   Application
 * @package    Application\Domain
 * @copyright  Copyright (c) 2015, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */

namespace Application\Domain;

use Zend\Form\Annotation as FormMapping;
use Zend\Stdlib\Hydrator\ObjectProperty;

/**
 * Base de formulaire.
 * 
 * @FormMapping\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * 
 * @property string $submit
 *
 * @category   Application
 * @package    Application\Domain
 * @copyright  Copyright (c) 2015, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
abstract class Form {

    /**
     * @var string Bouton de soumission du formulaire.
     * @access private
     * 
     * @FormMapping\Type("Zend\Form\Element\Submit")
     * @FormMapping\Options({
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12 text-center"
     * })
     * @FormMapping\Attributes({
     *     "value" : "Valider",
     *     "class" : "thm-btn mt-30 mb-30"
     * })
     */
    public $submit = 'Valider';

    /**
     * Retourner une copie des données.
     * 
     * @return array La copie des données
     */
    public function getArrayCopy() {
        
        return get_object_vars($this);
    }

    /**
     * Échanger la copie des données.
     * 
     * @param array $data
     */
    public function exchangeArray(array $data) {
        
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

}
