<?php

class LoginController extends Zend_Controller_Action
{
	protected $_model;
	
	public function indexAction()
	{
		$request = $this->getRequest();
		$form = $this->_getLoginForm();
		$this->view->users = $this->_getModel()->fetchEntries();
		if($this->getRequest()->isPost())
		{
			if($form->isValid($request->getPost()))
			{
				$model = $this->_getModel();
				$this->_helper->redirector('index', 'index');
				return;
			}
		}		
		$this->view->form = $form;
	}
	
	protected function _getModel()
	{
		if (null === $this->_model)
		{
			require_once APPLICATION_PATH . '/models/UserDao.php';
			$this->_model = new Model_User;
		}
		return $this->_model;
	}
	
	protected function _getLoginForm()
	{
		require_once APPLICATION_PATH . '/forms/Login.php';
		$form = new Form_Login();
		$form->setAction($this->_helper->url(''));
		return $form;
	}
}