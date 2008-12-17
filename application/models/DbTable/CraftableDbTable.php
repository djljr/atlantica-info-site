<?php

class Model_DbTable_Craftable extends Zend_Db_Table_Abstract
{
	protected $_name = "craftable";
	protected $_primary = "id";
	
	public function fetchAll()
	{
		return $this->fetchAll('1')->toArray();
	}
}