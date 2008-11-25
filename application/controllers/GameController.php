<?php

class GameController extends Zend_Controller_Action
{	
	protected $_mercenaryDao;
	
	public function mercenariesAction()
	{
		$mercenaryDao = $this->_getModel();

		$this->view->title = "Mercenary Information";
		$this->view->merc = $mercenaryDao->fetchMercenary("Swordsman");
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