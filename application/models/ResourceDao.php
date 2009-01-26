<?php
require_once 'AbstractDao.php';

class Model_Resource extends AbstractDao
{
	protected $_resourceTable;
	
	protected function getResourceTable()
	{
		if (null === $this->_resourceTable)
		{
			require_once APPLICATION_PATH . '/models/DbTable/ResourceDbTable.php';
			$this->_resourceTable = new Model_DbTable_Resource;
		}
		return $this->_resourceTable;
	}
	
	public function findByCraftableId($id, $main_resource = true)
	{
		$db = $this->getDbAdapter();
		$sql = 
			"select r.id as id, r.name as name, r.fixedprice as fixedprice, f.amount as amount, r.craftable as craftable, r.craftable_id as craftable_id " .
			"from resource r join formula f on r.id = f.resource_id ".
			"where f.craftable_id = ?";
		$resources = $db->fetchAssoc($sql, $id);
		foreach (array_keys($resources) as $key)
		{
			$resource = $resources[$key];
			if($resource['craftable'] == 1)
			{
				$res_comp = $this->findByCraftableId($resource['craftable_id'], false);
				$full_cost = 0;
				foreach($res_comp as $comp)
				{
					$full_cost += $comp['full_cost'];
				}
				$resource['components'] = $res_comp;
				$resource['full_cost'] = $full_cost;
			}
			else
			{
				if($main_resource)
					$resource['full_cost'] = $resource['fixedprice'];
				else
					$resource['full_cost'] = ($resource['fixedprice'] * $resource['amount']);
			}
			$resources[$key] = $resource;
		}
		return $resources;
	}
	
	public function save(array $resource)
	{
		$table = $this->getResourceTable();
		$fields = $table->info(Zend_Db_Table_Abstract::COLS);
		foreach($resource as $field => $value)
		{
			if(!in_array($field, $fields))
			{
				unset($data[$field]);
			}
		}
		return $table->insert($resource);
	}
	
	public function fetchAll()
	{
		return $this->getResourceTable()->fetchAll('1')->toArray();
	}
	
	public function fetchAllOrdered()
	{
		return $this->getResourceTable()->fetchAll('1', 'name')->toArray();
	}
	
	public function findByName($name)
	{
		$table = $this->getResourceTable();
		$select = $table->select()->where('name = ?', $name);
		$res = $table->fetchAll($select)->current();
		if($res)
			return $res->toArray();
		else
			echo $name . "<br />";
	}
	
	public function find($id)
	{
		$table = $this->getResourceTable();
		return $table->find($id)->current()->toArray();
	}
}