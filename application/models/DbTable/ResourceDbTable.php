<?php

class Model_DbTable_Resource extends Zend_Db_Table_Abstract
{
	protected $_name = "resource";
	protected $_primary = "id";
	
	public function findByName($name)
	{
		$select = $this->select()->where('name = ?', $name);
		$res = $table->fetchAll($select)->current();
		if($res)
			return $res->toArray();
		else
			echo $name . "<br />";
	}
}