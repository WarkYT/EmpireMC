<?php

namespace Application\Mvc\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Zend\Form\Form;
use Zend\Json\Json;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

/**
 * AbstractActionController offre quelques fonctionnalités d'accès rapide.
 */
abstract class AbstractActionController extends \Zend\Mvc\Controller\AbstractActionController {

    const FORM_DATA_NS = 'form-data';
    const FORM_MESSAGES_NS = 'form-messages';
    const LOADING_MESSAGE = '<img src="/assets/img/loading.gif" class="loading" />%s<br>Veuillez patienter, la page va être rechargée.';

    /**
     * Exécuter la requête.
     * 
     * @param MvcEvent $event
     * @return AbstractActionController
     */
    public function onDispatch(MvcEvent $event) {

        $actionResponse = parent::onDispatch($event);

        return $actionResponse;
    }

    /**
     * Envoyer une réponse au format JSON.
     * 
     * @param mixed $content Le contenu à formater
     * @return string La chaîne JSON
     */
    protected function sendJson($content) {

        return $this->getResponse()->setContent(Json::encode($content));
    }

    /**
     * Récupérer le dépôt de collection de l'entité.
     *
     * @param string $entityName Le nom de l'entité
     * @return Doctrine\ORM\EntityRepository Le dépôt de collection
     * @throws Exception | ServiceNotFoundException 
     */
    protected function locateRepository($entityName) {

        $entityManager = $this->locateService('Doctrine\ORM\EntityManager');

        return $entityManager->getRepository($entityName);
    }

    /**
     * Récupérer un service fonction de son nom.
     * 
     * @param string $name Le nom du service
     * @return object|array 
     * @throws Exception|ServiceNotFoundException 
     */
    protected function locateService($name) {

        $sm = $this->getServiceLocator();
        return $sm->get($name);
    }

    /**
     * Rediriger vers la page précédente.
     * 
     * @return string
     */
    protected function redirectPreviousPage() {

        $redirectUrl = '/';
        $referer = $this->getRequest()->getHeader('Referer');
        if ($referer) {
            $redirectUrl = $referer->getUri();
        }
        return $this->redirect()->toUrl($redirectUrl);
    }

    protected function addMessage($message, $namespace = null, $hops = 1) {

        $this->flashMessenger()->addMessage($message, $namespace, $hops);
    }

    protected function checkMessage($viewModel = null) {

        if (!$this->flashMessenger()->hasMessages()) {
            return;
        }

        if (empty($viewModel)) {
            $viewModel = $this->layout();
        }

        if ($viewModel->getVariable('notifier')) {
            $notifier = $viewModel->getVariable('notifier');
        }
        if(!isset($notifier['message'])){
            $notifier['message'] = [];
        }

        $notifier['message'] = array_merge($notifier['message'], $this->flashMessenger()->getMessages());
        $viewModel->setVariable('notifier', $notifier);
    }

    protected function addInfoMessage($message) {

        $this->flashMessenger()->addInfoMessage($message);
    }

    protected function checkInfoMessage($viewModel = null) {

        if (!$this->flashMessenger()->hasInfoMessages()) {
            return;
        }

        if (empty($viewModel)) {
            $viewModel = $this->layout();
        }

        if ($viewModel->getVariable('notifier')) {
            $notifier = $viewModel->getVariable('notifier');
        }
        if(!isset($notifier['info'])){
            $notifier['info'] = [];
        }

        $notifier['info'] = array_merge($notifier['info'], $this->flashMessenger()->getInfoMessages());
        $viewModel->setVariable('notifier', $notifier);
    }

    protected function addSuccessMessage($message) {

        $this->flashMessenger()->addSuccessMessage($message);
    }

    protected function checkSuccessMessage($viewModel = null) {

        if (!$this->flashMessenger()->hasSuccessMessages()) {
            return;
        }

        if (empty($viewModel)) {
            $viewModel = $this->layout();
        }

        if ($viewModel->getVariable('notifier')) {
            $notifier = $viewModel->getVariable('notifier');
        }
        if(!isset($notifier['success'])){
            $notifier['success'] = [];
        }

        $notifier['success'] = array_merge($notifier['success'], $this->flashMessenger()->getSuccessMessages());
        $viewModel->setVariable('notifier', $notifier);
    }

    protected function addWarningMessage($message) {

        $this->flashMessenger()->addWarningMessage($message);
    }

    protected function checkWarningMessage($viewModel = null) {

        if (!$this->flashMessenger()->hasWarningMessages()) {
            return;
        }

        if (empty($viewModel)) {
            $viewModel = $this->layout();
        }

        if ($viewModel->getVariable('notifier')) {
            $notifier = $viewModel->getVariable('notifier');
        }
        if(!isset($notifier['warning'])){
            $notifier['warning'] = [];
        }

        $notifier['warning'] = array_merge($notifier['warning'], $this->flashMessenger()->getWarningMessages());
        $viewModel->setVariable('notifier', $notifier);
    }

    protected function addErrorMessage($message) {

        $this->flashMessenger()->addErrorMessage($message);
    }

    protected function checkErrorMessage($viewModel = null) {

        if (!$this->flashMessenger()->hasErrorMessages()) {
            return;
        }

        if (empty($viewModel)) {
            $viewModel = $this->layout();
        }

        if ($viewModel->getVariable('notifier')) {
            $notifier = $viewModel->getVariable('notifier');
        }
        if(!isset($notifier['error'])){
            $notifier['error'] = [];
        }

        $notifier['error'] = array_merge($notifier['error'], $this->flashMessenger()->getErrorMessages());
        $viewModel->setVariable('notifier', $notifier);
    }

    protected function addFormErrorMessage(Form $form) {

        $this->flashMessenger()->addDataMessage($form->getData());
        $this->flashMessenger()->addFormMessage($form->getMessages());
    }

    protected function checkFormErrorMessage(Form $form = null, $viewModel = null) {

        if (!$this->flashMessenger()->hasFormMessages()) {
            return;
        }

        if (empty($viewModel)) {
            $viewModel = $this->layout();
        }

        if ($form != null) {
            $form->setData($this->flashMessenger()->getDataMessages());
        }

        if ($viewModel->getVariable('notifier')) {
            $notifier = $viewModel->getVariable('notifier');
        }
        if(!isset($notifier['form'])){
            $notifier['form'] = [];
        }

        $notifier['form'] = array_merge($notifier['form'], $this->flashMessenger()->getFormMessages());
        $viewModel->setVariable('notifier', $notifier);
    }

    protected function checkMessages(Form $form = null, $viewModel = null) {

        $this->checkInfoMessage($viewModel);
        $this->checkSuccessMessage($viewModel);
        $this->checkWarningMessage($viewModel);
        $this->checkErrorMessage($viewModel);
        $this->checkFormErrorMessage($form, $viewModel);
        
        return $viewModel;
    }

    public function messagesAction() {

        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);

        $this->checkMessages($viewModel);

        return $viewModel;
    }

    protected function initializeSession($namespace) {

        return new Container($namespace);
    }

    protected function machineSession($form = null) {

        $session = $this->initializeSession('Machine');

        if (!isset($session->uuid)) {
            $this->initializeMachineSession($session, $form->getObject()->getId(), $form->getObject()->getUuid());
        } else if ($form !== null && $session->id !== $form->getObject()->getId()) {
            if (!empty($session->uuid)) {
                @unlink(getcwd() . '/public/documents/machines/' . $session->uuid);
            }
            $this->initializeMachineSession($session, $form->getObject()->getId(), $form->getObject()->getUuid());
        }

        return $session;
    }

    protected function initializeMachineSession($session, $id, $uuid) {

        $session->id = $id;
        $session->uuid = $uuid;
        $session->pieces = new ArrayCollection();
        $session->documents = new ArrayCollection();

        return $session;
    }

    protected function removeFields($form, array $names) {

        foreach ($names as $name) {
            $form->remove($name);
            $form->getInputFilter()->remove($name);
        }
    }

    protected function removeFilters($form, array $names) {

        foreach ($names as $name) {
            $form->getInputFilter()->remove($name);
        }
    }

    protected function mkdir($path) {

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }

}
