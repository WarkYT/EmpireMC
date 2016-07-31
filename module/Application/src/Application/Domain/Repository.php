<?php

/**
 * Base de dépôt d'entité.
 *
 * @category   Application
 * @package    Application\Domain
 * @copyright  Copyright (c) 2015, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */

namespace Application\Domain;

use Application\Domain\Entity;
use Doctrine\ORM\EntityRepository;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineBuilder;
use Zend\Form\Annotation\AnnotationBuilder as ZendBuilder;
use Zend\Form\Form as ZendForm;

/**
 * Base de dépôt d'entité.
 *
 * @category   Application
 * @package    Application\Domain
 * @copyright  Copyright (c) 2015, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
abstract class Repository extends EntityRepository {

    /**
     * Créer une instance d'entité.
     * 
     * @return Entity Une instance d'entité
     * @access public
     */
    abstract public function create();

    /**
     * Peupler un formulaire fonction des champs fournis.
     * 
     * @param ZendForm $form Un formulaire
     * @param string $field Un champ du formulaire
     * @access public
     */
    public function populate(ZendForm $form, $field) {

        $form->get($field)->setValueOptions($this->findOptions(), $field);
    }

    /**
     * Retourner les données sous forme de tableau.
     * 
     * @param Entity $entity Une entité
     * @return Les données de sous forme de tableau
     * @access public
     */
    public function toArray(Entity $entity) {

        $hydrator = new DoctrineObject($this->getEntityManager());
        return $hydrator->extract($entity);
    }

    /**
     * Retourner une entité hydratée.
     * 
     * @param Entity $entity L'entité à hydrater
     * @param array $data Les données
     * @return Entity L'entité hydratée
     * @access public
     */
    public function hydrate(Entity $entity, array $data) {

        $hydrator = new DoctrineObject($this->getEntityManager());
        return $hydrator->hydrate($data, $entity);
    }

    /**
     * Retourner les options pour un élément de type select.
     * 
     * @param string $field
     * @param string $emptyValue
     * @param array $criteria Les critères d'exclusion
     * @return array La liste d'options
     * @access public
     */
    public function findOptions($field = '', $emptyValue = '', array $criteria = []) {

        return $this->findOptionsGroup($field, null, $emptyValue, $criteria);
    }

    /**
     * Retourner une liste d'options de type clé/paire.
     * 
     * @param string $field
     * @param string $fieldGroup
     * @param array $criteria Les critères d'exclusion
     * @return array La liste d'options
     * @access public
     */
    public function findOptionsGroup($field = '', $fieldGroup = '', $emptyValue = '', array $criteria = []) {

        if (empty($emptyValue)) {
            $emptyValue = 'Sélectionner votre choix';
        }

        $options = [
            0 => $emptyValue
        ];

        if (empty($criteria)) {
            $entities = $this->findAll();
        } else {
            $entities = $this->findBy($criteria);
        }

        foreach ($entities as $entity) {
            if ($field === '') {
                $field = 'id';
            }

            $getter = 'get' . ucfirst($field);

            if (empty($fieldGroup)) {
                $options[$entity->getId()] = $entity->$getter();
                continue;
            }

            if (!is_array($fieldGroup)) {
                $groupGetter = 'get' . ucfirst($fieldGroup);
                $options[$entity->$groupGetter()][$entity->getId()] = $entity->$getter();
            } else {
                $groupGetter = 'get' . ucfirst(key($fieldGroup));
                $labelGetter = 'get' . ucfirst(current($fieldGroup));

                $group = $entity->$groupGetter()->$labelGetter();

                $options[$group]['label'] = $group;
                $options[$group]['options'][$entity->getId()] = $entity->$getter();
            }
        }

        return $options;
    }

    /**
     * Libérer le gestionnaire d'entité.
     * 
     * @access public
     */
    public function flush() {

        parent::getEntityManager()->flush();
    }

    /**
     * Persister une entité.
     * 
     * @param Entity $entity l'entité à persister
     * @return Entity L'entité persistée
     * @access public
     */
    public function save(Entity $entity) {

        if ($entity->isNew()) {
            $entity->setCreatedAt(new \DateTime());
            parent::getEntityManager()->persist($entity);
        } else {
            $entity->setUpdatedAt(new \DateTime());
            $entity = parent::getEntityManager()->merge($entity);
        }

        parent::getEntityManager()->flush();


        return $entity;
    }

    /**
     * Supprimer une entité.
     * 
     * @param Entity|int $entity l'entité ou l'identifiant de l'entité à supprimer
     * @return Entity L'entité supprimée
     * @access public
     */
    public function delete($entity) {

        if (!($entity instanceof Entity)) {
            $entity = $this->find($entity);
        }

        parent::getEntityManager()->remove($entity);
        parent::getEntityManager()->flush();

        return $entity;
    }

    /**
     * Retourner le formulaire attaché à une entité.
     * 
     * @param Entity $entity L'entité à binder
     * @return ZendForm Le formulaire
     * @access protected
     */
    protected function doctrineForm(Entity $entity = null) {

        $builder = new DoctrineBuilder($this->getEntityManager());
        $form = $builder->createForm($entity);
        $form->setHydrator(new DoctrineObject($this->getEntityManager()));
        $form->bind($entity);

        return $form;
    }

    /**
     * Retourner un formulaire.
     * 
     * @param Form $formBase Un formulaire objet
     * @return ZendForm Le formulaire
     * @access protected
     */
    protected function zendForm(Form $formBase) {

        $builder = new ZendBuilder();
        $form = $builder->createForm($formBase);
        $form->bind($formBase);

        return $form;
    }

    /**
     * Retourner un dépôt de d'entité.
     * 
     * @param string $entityName Un nom d'entité
     * @return object Le dépôt d'entité
     * @access protected
     */
    protected function locateRepository($entityName) {

        return $this->getEntityManager()->getRepository($entityName);
    }

    public function findAll($offset = null, $limit = null) {

        if ($offset !== null) {
            $em = $this->getEntityManager();
            $qb = $em->createQueryBuilder();

            $alias = strtolower(substr($this->getClassName(), 0, 1));
            
            $qb->select($alias)
                    ->from($this->getClassName(), $alias)
                    ->setFirstResult($offset)
                    ->setMaxResults($limit);

            $query = $qb->getQuery();
            $paginator = new \Doctrine\ORM\Tools\Pagination\Paginator($query);

            return $paginator;
        }
        
        return parent::findAll();
    }

}
