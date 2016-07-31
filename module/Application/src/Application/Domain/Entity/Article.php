<?php

/**
 * Entité article.
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
 * Entité article.
 *
 * @ORMMapping\Table(name="article")
 * @ORMMapping\Entity(repositoryClass="Application\Domain\Repository\Article")
 * @FormMapping\Name("Application\Domain\Entity\Article")
 * 
 * @property string $name Nom
 * @property string $description Description
 * @property string $server Serveur
 * @property string $commnd Commande
 * @property string $type Type
 * @property string $price Prix
 * @property string $image Illustration
 * @property string $rank Grade
 * 
 * @category   Application
 * @package    Application\Domain\Entity
 * @copyright  Copyright (c) 2016, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
class Article extends Entity {

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
     * @var string Description
     *
     * @ORMMapping\Column(name="description", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Options({
     *     "label" : "Description",
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "description",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $description;

    /**
     * @var string Serveur
     *
     * @ORMMapping\Column(name="server", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Options({
     *     "label" : "Server",
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "server",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $server;

    /**
     * @var string Commande
     *
     * @ORMMapping\Column(name="commande", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Options({
     *     "label" : "Commande",
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "commande",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $command;

    /**
     * @var string Type
     *
     * @ORMMapping\Column(name="type", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Options({
     *     "label" : "Type",
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "type",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $type;

    /**
     * @var string Prix
     *
     * @ORMMapping\Column(name="price", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Options({
     *     "label" : "Price",
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "price",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $price;

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
     * @var string Grade
     *
     * @ORMMapping\Column(name="rank", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     * @FormMapping\Options({
     *     "label" : "Rank",
     *     "twb-form-group-size" : "col-lg-12 col-md-12 col-xs-12"
     * })
     * @FormMapping\Attributes({
     *     "id" : "rank",
     *     "required" : "true"
     * })
     * @FormMapping\Required(true)
     */
    protected $rank;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getServer() {
        return $this->server;
    }

    public function setServer($server) {
        $this->server = $server;
    }

    public function getCommand() {
        return $this->command;
    }

    public function setCommand($command) {
        $this->command = $command;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getRank() {
        return $this->rank;
    }

    public function setRank($rank) {
        $this->rank = $rank;
    }

}
