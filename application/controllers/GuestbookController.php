<?php

class GuestbookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $guestbookMapper = new Quickstart_Model_Mapper_Guestbook();
                $this->view->entries = $guestbookMapper->fetchAll();
    }

    public function signAction()
    {
        $request = $this->getRequest();
        $form    = new Quickstart_Form_Guestbook();
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Quickstart_Model_Guestbook($form->getValues());
                $mapper  = new Quickstart_Model_Mapper_Guestbook();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
            }
        }
 
        $this->view->form = $form;
    }


}



