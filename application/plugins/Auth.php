<?php
class Quickstart_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        if ('guestbook' == $request->getControllerName() && 'sign' == $request->getActionName()) {
            if (!Zend_Auth::getInstance()->hasIdentity()) {
                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $redirector->goto('index', 'auth');
            }
        }
    }
}
