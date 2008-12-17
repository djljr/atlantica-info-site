<?php
require_once 'AbstractDao.php';

class Model_Craftable extends AbstractDao
{
	protected $_craftableTable;
	protected $_resourceDao;
	
	private $craftable_select_from_clause = "select c.id as id, c.name as name, c.experience as experience, c.level as level, c.workload as workload, sum(r.fixedprice*f.amount) as cost, count(case when fixedprice>0 then fixedprice else null end) >= count(*) as actualcost from craftable c join formula f on c.id = f.craftable_id join resource r on r.id = f.resource_id ";
	private $craftable_groupby_clause = " group by c.id, c.name, c.experience, c.level, c.workload";
	public function fetchAll()
	{
		return $this->getCraftableTable()->fetchAll('1')->toArray();
	}
	
	public function findById($id)
	{
		$db = $this->getDbAdapter();
		$db->setFetchMode(Zend_Db::FETCH_ASSOC);
		$sql = $this->getCraftableSql("where c.id = ?");

		$craftable = $db->fetchRow($sql, $id);
		$resources = $this->getResourceDao()->findByCraftableId($id);
		$craftable['resources'] = $resources;
		
		return $craftable;
	}
	
	public function fetchAllWithStats()
	{
		$db = $this->getDbAdapter();
		$sql = $this->getCraftableSql();
		return $db->fetchAssoc($sql);
	}
	
	public function findAllWithResource($resourceId)
	{
		$db = $this->getDbAdapter();
		$sql = $this->getCraftableSql("where exists (select f.resource_id from formula f where f.craftable_id = c.id and f.resource_id = ?)");

		return $db->fetchAssoc($sql, $resourceId);
	}
		
	protected function getCraftableSql($where_clause = '')
	{
		return $this->craftable_select_from_clause . $where_clause . $this->craftable_groupby_clause;
	}
	
	protected function getCraftableTable()
	{
		if (null === $this->_craftableTable)
		{
			require_once APPLICATION_PATH . '/models/DbTable/CraftableDbTable.php';
			$this->_craftableTable = new Model_DbTable_Craftable;
		}
		return $this->_craftableTable;
	}
	protected function getResourceDao()
	{
		if (null === $this->_resourceDao)
		{
			require_once APPLICATION_PATH . '/models/ResourceDao.php';
			$this->_resourceDao = new Model_Resource;
		}
		return $this->_resourceDao;
	}
}