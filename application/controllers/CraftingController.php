<?php

class CraftingController extends Zend_Controller_Action
{	
	protected $_resourceDao;
	
	public function resourcesAction()
	{
		$resourceDao = $this->_getModel();

		$this->view->title = "Resource List";
		$this->view->resources = $resourceDao->fetchAllOrdered();
		
	}
	
	protected function _getModel()
	{
		if (null === $this->_resourceDao)
		{
			require_once APPLICATION_PATH . '/models/ResourceDao.php';
			$this->_resourceDao = new Model_Resource;
		}
		return $this->_resourceDao;
	}	
	
}