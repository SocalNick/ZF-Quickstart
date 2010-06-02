<?php
class Quickstart_Resource_View extends Zend_Application_Resource_View
{
    public function init()
    {
        $view = parent::init();
        $options = $this->getOptions();
        
        if(isset($options['headTitle'])) {
            $view->headTitle($options['headTitle']);
        }
        
        $view->headMeta()->setCharset('UTF-8');
        
        return $view;
    }
}