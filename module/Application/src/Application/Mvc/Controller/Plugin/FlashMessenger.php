<?php

namespace Application\Mvc\Controller\Plugin;

/**
 * Flash Messenger Plugin
 */
class FlashMessenger extends \Zend\Mvc\Controller\Plugin\FlashMessenger {

    /**
     * Warning messages namespace
     */
    const NAMESPACE_WARNING = 'warning';

    /**
     * Form messages namespace
     */
    const NAMESPACE_FORM = 'form';

    /**
     * Data messages namespace
     */
    const NAMESPACE_DATA = 'data';

    /**
     * Add a message with "form" type
     *
     * @param string $message
     * @return FlashMessenger
     */
    public function addFormMessage($message) {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_FORM);
        $this->addMessage($message);
        $this->setNamespace($namespace);

        return $this;
    }

    /**
     * Whether "form" namespace has messages
     *
     * @return bool
     */
    public function hasFormMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_FORM);
        $hasMessages = $this->hasMessages();
        $this->setNamespace($namespace);

        return $hasMessages;
    }

    /**
     * Get messages from "form" namespace
     *
     * @return array
     */
    public function getFormMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_FORM);
        $messages = $this->getMessages();
        $this->setNamespace($namespace);

        return $messages;
    }

    /**
     * Check to see if messages have been added to "form"
     * namespace within this request
     *
     * @return bool
     */
    public function hasCurrentFormMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_FORM);
        $hasMessages = $this->hasCurrentMessages();
        $this->setNamespace($namespace);

        return $hasMessages;
    }

    /**
     * Get messages that have been added to the "form"
     * namespace within this request
     *
     * @return array
     */
    public function getCurrentFormMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_FORM);
        $messages = $this->getCurrentMessages();
        $this->setNamespace($namespace);

        return $messages;
    }

    /**
     * Add a message with "data" type
     *
     * @param string $message
     * @return FlashMessenger
     */
    public function addDataMessage($message) {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_DATA);
        $this->addMessage($message);
        $this->setNamespace($namespace);

        return $this;
    }

    /**
     * Whether "data" namespace has messages
     *
     * @return bool
     */
    public function hasDataMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_DATA);
        $hasMessages = $this->hasMessages();
        $this->setNamespace($namespace);

        return $hasMessages;
    }

    /**
     * Get messages from "data" namespace
     *
     * @return array
     */
    public function getDataMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_DATA);
        $messages = $this->getMessages();
        $this->setNamespace($namespace);

        return $messages;
    }

    /**
     * Check to see if messages have been added to "data"
     * namespace within this request
     *
     * @return bool
     */
    public function hasCurrentDataMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_DATA);
        $hasMessages = $this->hasCurrentMessages();
        $this->setNamespace($namespace);

        return $hasMessages;
    }

    /**
     * Get messages that have been added to the "data"
     * namespace within this request
     *
     * @return array
     */
    public function getCurrentDataMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_DATA);
        $messages = $this->getCurrentMessages();
        $this->setNamespace($namespace);

        return $messages;
    }

    /**
     * Add a message with "warning" type
     *
     * @param string $message
     * @return FlashMessenger
     */
    public function addWarningMessage($message) {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_WARNING);
        $this->addMessage($message);
        $this->setNamespace($namespace);

        return $this;
    }

    /**
     * Whether "warning" namespace has messages
     *
     * @return bool
     */
    public function hasWarningMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_WARNING);
        $hasMessages = $this->hasMessages();
        $this->setNamespace($namespace);

        return $hasMessages;
    }

    /**
     * Get messages from "warning" namespace
     *
     * @return array
     */
    public function getWarningMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_WARNING);
        $messages = $this->getMessages();
        $this->setNamespace($namespace);

        return $messages;
    }

    /**
     * Check to see if messages have been added to "warning"
     * namespace within this request
     *
     * @return bool
     */
    public function hasCurrentWarningMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_WARNING);
        $hasMessages = $this->hasCurrentMessages();
        $this->setNamespace($namespace);

        return $hasMessages;
    }

    /**
     * Get messages that have been added to the "warning"
     * namespace within this request
     *
     * @return array
     */
    public function getCurrentWarningMessages() {
        $namespace = $this->getNamespace();
        $this->setNamespace(self::NAMESPACE_WARNING);
        $messages = $this->getCurrentMessages();
        $this->setNamespace($namespace);

        return $messages;
    }

}
