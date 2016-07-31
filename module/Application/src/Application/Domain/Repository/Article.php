<?php

namespace Application\Domain\Repository;

use Application\Domain\Entity;
use Application\Domain\Repository;
use Application\Domain\Entity\Article As ArticleEntity;

/**
 * Dépôt de joueurs.
 */
class Article extends Repository {

    /**
     * Créer une instance d'article.
     * 
     * @return Entity Une instance d'article
     * @access public
     */
    public function create() {
        
        return new ArticleEntity();
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
            $entity = new ArticleEntity();
            
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
