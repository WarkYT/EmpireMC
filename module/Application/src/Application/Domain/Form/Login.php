<?php

namespace Application\Domain\Form;

use Application\Domain\Form;
use Zend\Form\Annotation as FormMapping;

/**
 * Formulaire d'authentification.
 *
 * @FormMapping\Name("Application\Domain\Entity\Joueur")
 */
class Login extends Form {

    /**
     * @var int
     * @access protected
     *
     * @FormMapping\Options({
     *     "label" : "Pseudo",
     *     "twb-form-group-size" : "col-lg-6 col-md-6 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "pseudo",
     *     "required" : "true"
     * })
     */
    protected $pseudo;

    /**
     * @var int
     * @access protected
     *
     * @FormMapping\Type("Password")
     * @FormMapping\Options({
     *     "label" : "Password",
     *     "twb-form-group-size" : "col-lg-6 col-md-6 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "password",
     *     "required" : "true"
     * })
     */
    protected $password;

    public function getPseudo() {
        return $this->pseudo;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function hashPassword() {
        $this->password = hash('sha256', $this->password);
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

}
