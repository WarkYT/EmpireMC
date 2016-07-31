<?php

/**
 * Contrôleur Auth.
 *
 * @category   Application
 * @package    Application\Controller
 * @copyright  Copyright (c) 2016, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */

namespace Application\Controller;

use Application\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Contrôleur Auth.
 *
 * @category   Application
 * @package    Application\Controller
 * @copyright  Copyright (c) 2015, presteus.ovh
 * @license    http://www.wtfpl.net WTFPL
 */
class AuthController extends AbstractActionController {

    public function registerAction() {

        $joueurRepository = $this->locateRepository('Application\Domain\Entity\Joueur');
        $form = $joueurRepository->formOriginal();

        $form->setAttribute('action', '/application/auth/registering');

        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);

        $this->checkMessages();

        return $viewModel;
    }

    public function registeringAction() {

        if (!$this->request->isPost()) {
            $this->redirectPreviousPage();
        }

        $joueurRepository = $this->locateRepository('Application\Domain\Entity\Joueur');
        $form = $joueurRepository->formOriginal();

        $form->setData($this->request->getPost());

        if (!$form->isValid()) {
            $this->addFormErrorMessage($form);
            return $this->redirectPreviousPage();
        }

        $entity = $form->getData();
        $joueurRepository->save($entity);

        $this->addSuccessMessage('Votre compte a bien été créé.');

        return $this->redirect()->toUrl('/application/auth/login');
    }

    public function loginAction() {

        $joueurRepository = $this->locateRepository('Application\Domain\Entity\Joueur');
        $form = $joueurRepository->formLogin();

        $form->setAttribute('action', '/application/auth/logon');

        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);

        return $viewModel;
    }

    public function logonAction() {

        if (!$this->request->isPost()) {
            $this->redirectPreviousPage();
        }

        $joueurRepository = $this->locateRepository('Application\Domain\Entity\Joueur');
        $form = $joueurRepository->formLogin();

        $form->setData($this->request->getPost());

        if (!$form->isValid()) {
            $this->addFormErrorMessage($form);
            return $this->redirectPreviousPage();
        }

        $entity = $form->getData();
        $entity->hashPassword();

        $authService = $this->locateService('Zend\Authentication\AuthenticationService');

        $adapter = $authService->getAdapter();

        $adapter->setIdentity($entity->getPseudo());
        $adapter->setCredential($entity->getPassword());

        $authResult = $authService->authenticate();

        if (!$authResult->isValid()) {
            $this->addErrorMessage('Your authentication credentials are not valid');
            return $this->redirectPreviousPage();
        }

        $identity = $authResult->getIdentity();
        $authService->getStorage()->write($identity);

        $this->addSuccessMessage('Welcome <b>' . $entity->getPseudo() . '</b>');

        return $this->redirect()->toUrl('/');
    }

    public function logoutAction() {
        
        $authService = $this->locateService('Zend\Authentication\AuthenticationService');
        $authService->clearIdentity();

        $this->addMessage("You have been logged out");
        
        return $this->redirect()->toUrl('/application/auth/login');
    }

    public function denyAction() {

        $this->addErrorMessage("You do not have the privileges to access this resource");
        
        return $this->redirect()->toUrl('/application/auth/login');
    }

}
