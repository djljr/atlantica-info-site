<?php
require_once 'AbstractDao.php';

class Model_CalendarEvent extends AbstractDao
{
	protected $_table;
	
	public function getTable()
	{
		if (null === $this->_table)
		{
			require_once APPLICATION_PATH . '/models/DbTable/CalendarEventDbTable.php';
			$this->_table = new Model_DbTable_CalendarEvent;
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
	
	public function fetchMonthEvents($month, $year)
	{
		$db = $this->getDbAdapter();
		$tsStart = mktime(0,0,0,$month,1,$year);
		$lastDay = cal_days_in_month(0, $month, $year);
		$tsEnd = mktime(23,59,59,$month, $lastDay ,$year);
		
		$sql = "select id, timestamp, title, category, symbol, description from calendar_event where (timestamp > ?) and (timestamp < ?) order by timestamp";
		$rows = $db->fetchAssoc($sql, array($tsStart, $tsEnd));
		
		$events = array();
		$events['result'] = $rows;
		$events['month'] = array();
		foreach($rows as $row)
		{
			$day = date('d', $row['timestamp']);
			$events['month'][] = $day;
		}
		
		return $events;
	}
}