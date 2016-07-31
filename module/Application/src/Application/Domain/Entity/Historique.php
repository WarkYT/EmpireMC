<?php

/**
 * Entité historique.
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
 * Entité historique.
 *
 * @ORMMapping\Table(name="historique")
 * @ORMMapping\Entity(repositoryClass="Application\Domain\Repository\Historique")
 * @FormMapping\Name("Application\Domain\Entity\Historique")
 * 
 * 
  `nom_offre` varchar(255) NOT NULL,
  `adresse_ip` varchar(30) NOT NULL,
  `rembourse` int(2) NOT NULL DEFAULT '0'
 * 
 * @property string $joueur Joueur
 * @property string $article Article
 * @property string $buyAt Date d'achat
 * @property string $refundAt Date de remboursement
 * 
 * @category   Application
 * @package    Application\Domain\Entity
 * @copyright  Copyright (c) 2016, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
class Historique extends Entity {

    /**
     * @var \Doctrine\Common\Collections\Collection|Joueur[] Joueurs
     *
     * @FormMapping\Exclude()
     * @ORM\ManyToMany(targetEntity="UserGroup", inversedBy="users")
     * @ORM\JoinTable(
     *  name="joueur_achat",
     *  joinColumns={
     *      @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="boutique_id", referencedColumnName="id")
     *  }
     * )
     */
    protected $joueur;

    /**
     * @var Article Article
     *
     * @FormMapping\Exclude()
     */
    protected $article;

    /**
     * @var \DateTime Date d'achat
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="buyAt", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    protected $buyAt;

    /**
     * @var \DateTime Date de remboursement
     *
     * @FormMapping\Exclude()
     * @ORMMapping\Column(name="updatedAt", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    protected $refundAt;

    public function getJoueur() {
        return $this->joueur;
    }

    public function getArticle() {
        return $this->article;
    }

    public function getBuyAt() {
        return $this->buyAt;
    }

    public function getRefundAt() {
        return $this->refundAt;
    }

    public function setJoueur(Joueur $joueur) {
        $this->joueur = $joueur;
    }

    public function setArticle(Article $article) {
        $this->article = $article;
    }

    public function setBuyAt(\DateTime $buyAt) {
        $this->buyAt = $buyAt;
    }

    public function setRefundAt(\DateTime $refundAt) {
        $this->refundAt = $refundAt;
    }

}
