<?php

class Model_DbTable_Mercenary extends Zend_Db_Table_Abstract
{
	protected $_name = "mercenary";
	protected $_primary = "id";
	protected $_sequence = false;
	
	public function update(array $data, $where)
	{
		throw new Exception ("can't update mercenaries");
	}
}