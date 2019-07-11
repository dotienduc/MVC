<?php 

namespace App\core;

use App\core\Registry;

abstract class AbstractDataMapper
{
	
	public function __construct()
	{
		$this->adapter();
	}

	public function adapter()
	{
		return Registry::getInstance()->adapter;
	}

	public function save()
	{
		// echo "<pre>";
		// print_r((array) $this);
		return $this->adapter()->insert($this->entityTable(), (array) $this);
	}

	public function update()
	{
		$this->adapter()->update($this->entityTable(), (array) $this, $where = " id = ".$this->id."");
	}

	public function delete()
	{
		$this->adapter()->delete($this->entityTable(), $where = " id = ".$this->id."");
	}

	public function hasOne($object, array $bind)
	{
		$ob = new $object;
		return $ob->findById($bind);
	}

	public function hasMany($object, $bind)
	{
		$ob = new $object;
		return $ob->findAll($bind);
	}

	public function countRow()
	{
		return $this->adapter()->countAffectedRows();
	}

	public function getLastId($name = null)
	{
		return $this->adapter()->getLastInsertId($name);
	}

	public function findById(array $conditions = array())
	{
		$this->adapter()->select($this->entityTable(), $conditions);

		if(!$row = $this->adapter()->fetch())
		{
			throw new \Exception('Not isset id of '. get_class($this));
		}

		return $this->createEntity($row);
	}

	public function findAll(array $conditions = array())
	{
		$entities = array();
		$this->adapter()->select($this->entityTable(), $conditions);
		$rows = $this->adapter()->fetchAll();

		if($rows)
		{
			foreach ($rows as $row) {
				$entities[] = $this->createEntity($row);
			}
		}

		return $entities;
	}

	abstract protected function createEntity(array $row);
}
