<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        /* @var $bootstrap Bootstrap */
        $bootstrap = $this->getInvokeArg('bootstrap');
        /* @var $db Zend_Db_Adapter_Pdo_Mysql */
        $db = $bootstrap->getResource('db');
        
        $loginForm = new Quickstart_Form_Auth();
        if ($this->getRequest()->isPost()) {
            if ($loginForm->isValid($this->_request->getPost())) {
                $auth = Zend_Auth::getInstance();
                $adapter = new Zend_Auth_Adapter_DbTable(
                    $db,
                    'users',
                    'username',
                    'password',
                    'MD5(CONCAT(?, password_salt))'
                    );
                $adapter->setIdentity($loginForm->getValue('username'));
                $adapter->setCredential($loginForm->getValue('password'));
                $result = $auth->authenticate($adapter);
                if ($result->isValid()) {
                    $this->_helper->FlashMessenger('Successful Login');
                    $this->_redirect('/');
                    return;
                }
            }
        }
        $this->view->form = $loginForm;
    }
    
    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }


}

