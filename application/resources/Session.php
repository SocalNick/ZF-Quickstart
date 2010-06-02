<?php
class Quickstart_Resource_Session extends Zend_Application_Resource_Session
{
    public function init()
    {
        parent::init();
        
        // After options have been set, make sure to start session
        // Avoids Error: Headers Already Sent
        Zend_Session::start();
    }
}
