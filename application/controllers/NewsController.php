<?php

class NewsController extends Zend_Controller_Action
{
	protected $_model;
	
	public function indexAction()
	{
		$model = $this->_getModel();
		$this->view->title = 'News';
		$this->view->stories = $model->fetchEntries();
	}
	
	protected function _getModel()
	{
		if (null === $this->_model)
		{
			require_once APPLICATION_PATH . '/models/NewsDao.php';
			$this->_model = new Model_News;
		}
		return $this->_model;
	}
	
}