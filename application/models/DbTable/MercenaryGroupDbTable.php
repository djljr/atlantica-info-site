<?php

class Model_DbTable_MercenaryGroup extends Zend_Db_Table_Abstract
{
	protected $_name = "mercenary_group";
	protected $_primary = "id";
	protected $_sequence = false;
	
	public function update(array $data, $where)
	{
		throw new Exception ("can't update mercenaries");
	}
}