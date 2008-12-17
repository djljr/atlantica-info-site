<?php

class AbstractDao
{
	protected $_dbAdapter;
	
	protected function getDbAdapter()
	{
		if(null === $this->_dbAdapter)
		{
			$registry = Zend_Registry::getInstance();
			$this->_dbAdapter = $registry->dbAdapter;
		}
		
		return $this->_dbAdapter;
	}
}