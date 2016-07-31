<?php

namespace Application\Domain\Repository;

use Application\Domain\Entity;
use Application\Domain\Repository;
use Application\Domain\Entity\Joueur As JoueurEntity;
use Zend\Form\Form as ZendForm;

/**
 * Dépôt de joueurs.
 */
class Joueur extends Repository {

    /**
     * Créer une instance de joueur.
     * 
     * @return Entity Une instance de joueur
     * @access public
     */
    public function create() {
        
        return new JoueurEntity();
    }

    /**
     * Retourner le formulaire de base.
     * 
     * @param int $id The user ID
     * @param array $nullize The fields to set null
     * @return \Zend\Form\Form Le formulaire de base
     * @access public
     */
    public function formOriginal($id = null, array $nullize = []) {
        
        if ($id === null || $id < 1) {
            $entity = new JoueurEntity();
            
        } else {
            $entity = $this->find($id);
            foreach ($nullize as $field) {
                $setter = 'set' . ucfirst($field);
                $entity->$setter(null);
            }
        }
        $form = parent::doctrineForm($entity);

        return $form;
    }

    /**
     * Retourner le formulaire de login.
     * 
     * @return ZendForm Le formulaire de login
     * @access public
     */
    public function formLogin() {

        $form = parent::zendForm(new \Application\Domain\Form\Login());

        return $form;
    }

    public function save(Entity $entity) {

        if ($entity->isNew()) {
            $entity->hashPassword();
            $entity->setRole('joueur');
        }
        
        return parent::save($entity);
    }

}
