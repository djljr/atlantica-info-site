<?php

class Model_Mercenary
{
	protected $_table;
	
	public function getTable()
	{
		if (null === $this->_table)
		{
			require_once APPLICATION_PATH . '/models/DbTable/MercenaryDbTable.php';
			$this->_table = new Model_DbTable_Mercenary;
		}
		return $this->_table;
	}
	
	public function fetchAll()
	{
		return $this->getTable()->fetchAll('1')->toArray();
	}
	
	public function fetchMercenary($name)
	{
		$table = $this->getTable();
		return $table->find($name)->current()->toArray();
	}
}