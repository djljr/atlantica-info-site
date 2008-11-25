<?php

class Model_DbTable_User extends Zend_Db_Table_Abstract
{
	protected $_name = "user";
	protected $_primary = "id";
	
	public function update(array $data, $where)
	{
		throw new Exception ("can't update users");
	}
}