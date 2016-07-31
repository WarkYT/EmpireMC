<?php

/**
 * Entité plugin.
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
 * Entité plugin.
 *
 * @ORMMapping\Table(name="plugin")
 * @ORMMapping\Entity(repositoryClass="Application\Domain\Repository\Plugin")
 * @FormMapping\Name("Application\Domain\Entity\Plugin")
 * 
 * @property string $name Nom
 * @property string $image Illustration
 * @property string $link Lien
 * 
 * @category   Application
 * @package    Application\Domain\Entity
 * @copyright  Copyright (c) 2016, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
class Plugin extends Entity {

    /**
     * @var string Nom
     *
     * @ORMMapping\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Options({
     *     "label" : "Name",
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "name",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $name;

    /**
     * @var string Illustration
     *
     * @ORMMapping\Column(name="image", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Options({
     *     "label" : "Image",
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "image",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $image;

    /**
     * @var string Lien
     *
     * @ORMMapping\Column(name="link", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Options({
     *     "label" : "Link",
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "link",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $link;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getLink() {
        return $this->link;
    }

    public function setLink($link) {
        $this->link = $link;
    }

}
