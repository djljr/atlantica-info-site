<?php

class Model_Resource
{
	protected $_resourceTable;
	
	protected function getResourceTable()
	{
		if (null === $this->_resourceTable)
		{
			require_once APPLICATION_PATH . '/models/DbTable/ResourceDbTable.php';
			$this->_resourceTable = new Model_DbTable_Resource;
		}
		return $this->_resourceTable;
	}
	
	public function save(array $resource)
	{
		$table = $this->getResourceTable();
		$fields = $table->info(Zend_Db_Table_Abstract::COLS);
		foreach($resource as $field => $value)
		{
			if(!in_array($field, $fields))
			{
				unset($data[$field]);
			}
		}
		return $table->insert($resource);
	}
	
	public function fetchAll()
	{
		return $this->getResourceTable()->fetchAll('1')->toArray();
	}
	
	public function fetchAllOrdered()
	{
		return $this->getResourceTable()->fetchAll('1', 'name')->toArray();
	}
}