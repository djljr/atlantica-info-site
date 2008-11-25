<?php

class Model_Article
{
	protected $_table;
	
	public function getTable()
	{
		if (null === $this->_table)
		{
			require_once APPLICATION_PATH . '/models/DbTable/ArticleDbTable.php';
			$this->_table = new Model_DbTable_Article;
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
	
	public function fetchEntries()
	{
		return $this->getTable()->fetchAll('1')->toArray();
	}
	
	public function fetchEntry($id)
	{
		$table = $this->getTable();
		$select = $table->select()->where('id=?', $id);
		return $table->fetchRow($select)->toArray();
	}
}