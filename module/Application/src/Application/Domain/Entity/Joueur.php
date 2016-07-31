<?php

/**
 * Entité joueur.
 *
 * @category   Application
 * @package    Application\Domain\Entity
 * @copyright  Copyright (c) 2016, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */

namespace Application\Domain\Entity;

use Application\Domain\Entity;
use Doctrine\ORM\Mapping as ORMMapping;
use Zend\Form\Annotation as FormMapping;

/**
 * Entité joueur.
 *
 * @ORMMapping\Table(name="joueur")
 * @ORMMapping\Entity(repositoryClass="Application\Domain\Repository\Joueur")
 * @FormMapping\Name("Application\Domain\Entity\Joueur")
 * 
 * @property string $pseudo Pseudo
 * @property string $password Mot de passe
 * @property string $email Courriel
 * @property string $role Role
 * @property string $points Points
 * @property string $skin Skin
 * @property string $cloak Cape
 * @property string $vote Nombre de vote
 * @property string $rewards Récompenses
 * @property string $loginAt Date de dernière connexion
 * @property string $votedAt Date du dernier vote
 * 
 * @category   Application
 * @package    Application\Domain\Entity
 * @copyright  Copyright (c) 2016, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
class Joueur extends Entity {

    /**
     * @var string Pseudo
     *
     * @ORMMapping\Column(name="pseudo", type="string", length=32, precision=0, scale=0, nullable=false, unique=true)
     * @FormMapping\Options({
     *     "label" : "Pseudo",
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "pseudo",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $pseudo;

    /**
     * @var string Mot de passe
     *
     * @ORMMapping\Column(name="password", type="string", length=64, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Type("Password")
     * @FormMapping\Options({
     *     "label" : "Password",
     *     "twb-form-group-size" : "col-lg-6 col-md-6 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "password",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $password;

    /**
     * @var string Mot de passe de confirmation
     *
     * @FormMapping\Type("Password")
     * @FormMapping\Options({
     *     "label" : "Confirm password",
     *     "twb-form-group-size" : "col-lg-6 col-md-6 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "passwordConfirm",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     * @FormMapping\Validator({
     *     "name":"Identical",
     *     "options":{
     *         "token" : "password"
     * }})
     */
    protected $passwordConfirm;

    /**
     * @var string Courriel
     *
     * @ORMMapping\Column(name="email", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Type("Email")
     * @FormMapping\Options({
     *     "label" : "Email",
     *     "twb-form-group-size" : "col-lg-6 col-md-6 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "email",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $email;

    /**
     * @var string Courriel de confirmation
     *
     * @FormMapping\Type("Email")
     * @FormMapping\Options({
     *     "label" : "Confirm Email",
     *     "twb-form-group-size" : "col-lg-6 col-md-6 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "emailConfirm",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     * @FormMapping\Validator({
     *     "name":"Identical",
     *     "options":{
     *         "token" : "email"
     * }})
     */
    protected $emailConfirm;

    /**
     * @var string Role du joueur
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="role", type="string", length=16, precision=0, scale=0, nullable=false, unique=false)
     */
    protected $role;

    /**
     * @var string Pseudo
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="points", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    protected $points;

    /**
     * @var string Skin
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="skin", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    protected $skin;

    /**
     * @var string Cape
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="cloak", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    protected $cloak;

    /**
     * @var string Nombre de vote
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="vote", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    protected $vote;

    /**
     * @var string Récompenses
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="rewards", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    protected $rewards;

    /**
     * @var \DateTime Date de dernière connexion
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="loginAt", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    protected $loginAt;

    /**
     * @var \DateTime Date du dernier vote
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="votedAt", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    protected $votedAt;

    /**
     * @var string
     *
     * @FormMapping\Type("Zend\Form\Element\Checkbox")
     * @FormMapping\Options({
     *     "label" : "En cochant cette case, j'accepte les CGU",
     *     "label_attributes" : {
     *         "class" : "inline"
     *     },
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "cgu",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $cgu;

    public function __construct() {
        $this->setPoints(0);
        $this->setVote(0);
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function hashPassword() {
        $this->password = hash('sha256', $this->password);
    }

    public function getPassword() {
        return $this->password;
    }

    public function getPasswordConfirm() {
        return $this->passwordConfirm;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getEmailConfirm() {
        return $this->emailConfirm;
    }

    public function getRole() {
        return $this->role;
    }

    public function getPoints() {
        return $this->points;
    }

    public function getSkin() {
        return $this->skin;
    }

    public function getCloak() {
        return $this->cloak;
    }

    public function addVote() {
        $this->vote++;
        $this->setVotedAt(new \DateTime());
    }

    public function getVote() {
        return $this->vote;
    }

    public function getRewards() {
        return $this->rewards;
    }

    public function getLoginAt() {
        return $this->loginAt;
    }

    public function getVotedAt() {
        return $this->votedAt;
    }

    public function getCgu() {
        return $this->cgu;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setPasswordConfirm($passwordConfirm) {
        $this->passwordConfirm = $passwordConfirm;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setEmailConfirm($emailConfirm) {
        $this->emailConfirm = $emailConfirm;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setPoints($points) {
        $this->points = $points;
    }

    public function setSkin($skin) {
        $this->skin = $skin;
    }

    public function setCloak($cloak) {
        $this->cloak = $cloak;
    }

    public function setVote($vote) {
        $this->vote = $vote;
    }

    public function setRewards($rewards) {
        $this->rewards = $rewards;
    }

    public function setLoginAt(\DateTime $loginAt) {
        $this->loginAt = $loginAt;
    }

    public function setVotedAt(\DateTime $votedAt) {
        $this->votedAt = $votedAt;
    }

    public function setCgu($cgu) {
        $this->cgu = $cgu;
    }

}
