<?php

class GameController extends Zend_Controller_Action
{	
	protected $_mercenaryDao;
	
	public function mercenariesAction()
	{
		$mercenaryDao = $this->_getModel();

		$this->view->title = "Mercenary Information";
		$this->view->mercenaries = $mercenaryDao->fetchBaseClassMercenariesInGroups();
		$this->view->groups = $mercenaryDao->fetchGroupNames();
	}
	
	public function mercenaryAction()
	{
		$mercenaryDao = $this->_getModel();
		$merc = $this->_getParam("merc");
		if($merc)
		{
			$this->view->merc = $mercenaryDao->fetchMercenary($merc);
		}
	}
	
	protected function _getModel()
	{
		if (null === $this->_mercenaryDao)
		{
			require_once APPLICATION_PATH . '/models/MercenaryDao.php';
			$this->_model = new Model_Mercenary;
		}
		return $this->_model;
	}	
	
}