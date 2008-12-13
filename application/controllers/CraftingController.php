<?php

class CraftingController extends Zend_Controller_Action
{	
	protected $_resourceDao;
	protected $_redirector = null;

    public function init()
    {
        $this->_redirector = $this->_helper->getHelper('Redirector');
    }
	
    
	public function resourcesAction()
	{
		$resourceDao = $this->_getModel();

		$this->view->title = "Resource List";
		$this->view->resources = $resourceDao->fetchAllOrdered();
		
	}
	
	public function addresourceAction()
	{
		$resourceDao = $this->_getModel();
		
		$name = $this->getRequest()->getParam("name");
		$price = $this->getRequest()->getParam("fixedprice");
		
		$resource = array('name' => $name, 'fixedprice' => $price);
		$resourceDao->save($resource);
		
		$this->_redirector->gotoSimple("resources", "crafting");
	}
	
	public function exportresourcesAction()
	{
		$resourceDao = $this->_getModel();
		$this->view->resources = $resourceDao->fetchAll();
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