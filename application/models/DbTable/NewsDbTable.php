<?php

class Model_DbTable_News extends Zend_Db_Table_Abstract
{
	protected $_name = "news";
	protected $_primary = "id";
	
	public function insert(array $data)
	{
		$data['created_date'] = date('Y-m-d H:i:s');
		return parent::insert($data);
	}
	
	public function update(array $data, $where)
	{
		throw new Exception ("can't update articles");
	}
}