<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initAutoloader()
    {
        $autoloader = $this->getResourceLoader();
        $autoloader->addResourceType('widgets', 'widgets', 'Widget');
        
        $bar = new Quickstart_Widget_Bar();
    }

}

