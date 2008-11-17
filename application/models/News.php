<?php

class Model_News
{
	protected $_table;
	
	public function getTable()
	{
		if (null === $this->_table)
		{
			require_once APPLICATION_PATH . '/models/DbTable/NewsDao.php';
			$this->_table = new Model_DbTable_News;
		}
		return $this->_table;
	}
	
	public function save(array $data)
	{
		$table = $this->getTable();
		$fields = $table->info(Zend_Db_Table_Abstract::COLS);
		foreach($data as $field => $value)
		{
			if(!in_array($field, $fields))
			{
				unset($data[$field]);
			}
		}
		return $table->insert($data);
	}
	
	public function fetchTopStories($numToFetch)
	{
		$table = $this->getTable();
		$select = $table->select()->order('created_date desc')->limit($numToFetch,0);
	}
	
	public function fetchEntries()
	{
		return $this->getTable()->fetchAll('1')->toArray();
	}
	
	public function fetchEntry($id)
	{
		$table = $this->getTable();
		return $table->find($id);
	}
}