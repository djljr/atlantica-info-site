<?php

class Model_DbTable_CalendarEvent extends Zend_Db_Table_Abstract
{
	protected $_name = "calendar_event";
	protected $_primary = "id";
	
	public function fetchAll()
	{
		return $this->fetchAll('1')->toArray();
	}
}