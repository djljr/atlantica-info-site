<?php

class Model_Mercenary
{
	protected $_mercTable;
	protected $_groupTable;
	
	protected function getMercenaryTable()
	{
		if (null === $this->_mercTable)
		{
			require_once APPLICATION_PATH . '/models/DbTable/MercenaryDbTable.php';
			$this->_mercTable = new Model_DbTable_Mercenary;
		}
		return $this->_mercTable;
	}
	
	protected function getGroupTable()
	{
		if (null === $this->_groupTable)
		{
			require_once APPLICATION_PATH . '/models/DbTable/MercenaryGroupDbTable.php';
			$this->_groupTable = new Model_DbTable_MercenaryGroup;
		}
		return $this->_groupTable;		
	}
	public function fetchAll()
	{
		return $this->getMercenaryTable()->fetchAll('1')->toArray();
	}
	
	public function fetchMercenary($name)
	{
		$table = $this->getMercenaryTable();
		
		$merc = $table->find($name)->current();
		if($merc)
			return $merc->toArray();
		else
			return null;
	}
	
	public function fetchBaseClassMercenaries()
	{
		$table = $this->getMercenaryTable();
		$select = $table->select()->where('base is null');
		return $table->fetchAll($select)->toArray();
	}
	
	public function fetchBaseClassMercenariesInGroups()
	{
		$mercGroups = array();
		
		foreach($this->fetchBaseClassMercenaries() as $merc)
		{
			$mercGroups[$merc['group']][] = $merc;	
		}
		
		return $mercGroups;
	}
	
	public function fetchGroupNames()
	{
		$groupNames = array();
		
		$table = $this->getGroupTable();
		$groupResult = $table->fetchAll('1')->toArray();
		
		foreach($groupResult as $group)
		{
			$groupNames[$group['id']] = $group['name'];
		}
		
		return $groupNames;
	}
}