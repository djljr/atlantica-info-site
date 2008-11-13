<?php

class Model_DbTable_User extends Zend_Db_Table_Abstract
{
	protected $_name = "user";
	
	public function insert(array $data)
	{
		$data['created'] = date('Y-m-d H:i:s');
		return parent::insert($data);
	}
	
	public function update(array $data, $where)
	{
		throw new Exception ("can't update users");
	}
}