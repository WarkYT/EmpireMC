<?php

namespace Application\Domain\Repository;

use Application\Domain\Entity;
use Application\Domain\Repository;
use Application\Domain\Entity\Plugin As PluginEntity;

/**
 * Dépôt de joueurs.
 */
class Plugin extends Repository {

    /**
     * Créer une instance de plugin.
     * 
     * @return Entity Une instance de plugin
     * @access public
     */
    public function create() {
        
        return new PluginEntity();
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
            $entity = new PluginEntity();
            
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

}
