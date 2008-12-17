<?php

class CraftingController extends Zend_Controller_Action
{	
	protected $_resourceDao;
	protected $_craftableDao;
	
	public function craftablesAction()
	{
		$craftableDao = $this->_getCraftableDao();
		
		$this->view->title = "List of Craftables";
		$this->view->data = $craftableDao->fetchAllWithStats();
	}
	
	public function craftableAction()
	{
		$craftableDao = $this->_getCraftableDao();
		$id = $this->_getParam("cid");
		
		$craftable = $craftableDao->findById($id);
		$this->view->craftable = $craftable; 
		$this->view->title = $this->view->craftable['name'];
	}
	
	public function resourcesAction()
	{
		$resourceDao = $this->_getResourceDao();

		$this->view->title = "Resource List";
		$this->view->resources = $resourceDao->fetchAllOrdered();
		
	}
	
	public function resourceAction()
	{
		$resourceDao = $this->_getResourceDao();
		$craftableDao = $this->_getCraftableDao();
		$id = $this->_getParam("rid");
		
		$resource = $resourceDao->find($id);
		$craftables = $craftableDao->findAllWithResource($id);
		
		$resource['craftables'] = $craftables;
		$this->view->resource = $resource;
		$this->view->title = $resource['name'];
	}
	
	protected function _getResourceDao()
	{
		if (null === $this->_resourceDao)
		{
			require_once APPLICATION_PATH . '/models/ResourceDao.php';
			$this->_resourceDao = new Model_Resource;
		}
		return $this->_resourceDao;
	}
	
	protected function _getCraftableDao()
	{
		if (null === $this->_craftableDao)
		{
			require_once APPLICATION_PATH . '/models/CraftableDao.php';
			$this->_craftableDao = new Model_Craftable;
		}
		return $this->_craftableDao;
	}
}