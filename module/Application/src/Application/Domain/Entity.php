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

use Doctrine\ORM\Mapping as ORMMapping;
use Zend\Form\Annotation as FormMapping;

/**
 * Base d'entité.
 * 
 * @ORMMapping\MappedSuperclass
 * 
 * @FormMapping\Hydrator("DoctrineModule\Stdlib\Hydrator\DoctrineObject")
 * 
 * @property int $id Identifiant de l'entité
 * @property string $createdAt Date de création
 * @property string $updatedAt Date de mise à jour
 *
 * @category   Application
 * @package    Application\Domain
 * @copyright  Copyright (c) 2015, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
abstract class Entity extends Form {

    /**
     * @var int Identifiant de l'entité.
     * @access private
     * 
     * @ORMMapping\Id
     * @ORMMapping\GeneratedValue(strategy = "AUTO")
     * @ORMMapping\Column(type = "integer")
     * 
     * @FormMapping\Type("Zend\Form\Element\Hidden")
     */
    protected $id;

    /**
     * @var \DateTime Date de création
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="createdAt", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    protected $createdAt;

    /**
     * @var \DateTime Date de mise à jour
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="updatedAt", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    protected $updatedAt;

    /**
     * Retourner l'indicateur de persistance.
     * 
     * @return int L'indicateur de persistance
     * @access public
     */
    public function isNew() {
        return $this->id === null || $this->id < 0;
    }

    /**
     * Retourner l'identifiant de l'entité.
     * 
     * @return int L'identifiant
     * @access public
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Positionner un identifiant de l'entité.
     * 
     * @param int $id Un identifiant
     * @access public
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Retourner la date de création.
     * 
     * @return \DateTime La date de création
     * @access public
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Positionner une date de création.
     * 
     * @param \DateTime $createdAt Une date de création
     * @access public
     */
    public function setCreatedAt(\DateTime $createdAt) {
        $this->createdAt = $createdAt;
    }

    /**
     * Retourner la date de mise à jour.
     * 
     * @return \DateTime La date de mise à jour
     * @access public
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Positionner une date de mise à jour.
     * 
     * @param \DateTime $updatedAt Une date de mise à jour
     * @access public
     */
    public function setUpdatedAt(\DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
    }

}
