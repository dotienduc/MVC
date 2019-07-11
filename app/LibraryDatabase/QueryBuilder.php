<?php 

namespace App\LibraryDatabase;

use \PDOExeption;
use \PDO;
use App\core\Registry;

class QueryBuilder
{
	private $columns; 

	private $from; 

	private $wheres;	

	private $distinct = false; 

	private $joins;	

	private $groups;

	private $havings;

	private $order;

	private $limit;

	private $offset;

	// Get name table 
	public function __construct($tableName)
	{
		$this->from = $tableName;
	}

	// Construct name table
	public static function table($tableName = "")
	{
		return new self($tableName);
	}

	// Select colulmns
	public function select($columns)
	{
		$this->columns = is_array($columns) ? $columns : func_get_args($columns);
		return $this;
	}

	public function distinct()
	{
		$this->distinct = true;
		return $this;
	}

	public function join($table, $first, $operator, $second, $type = "inner")
	{
		$this->joins[] = [$table, $first, $operator, $second, $type];
		return $this;
	}

	public function leftJoin($table, $first, $operator, $second)
	{
		return $this->join($table, $first, $operator, $second, $type = "left");
	}

	public function rightJoin($table, $first, $operator, $second)
	{
		return $this->join($table, $first, $operator, $second, $type = "right");
	}

	public function where($column, $operator, $value, $boolean = 'and')
	{	
		$this->wheres[] = [$column, $operator, $value, $boolean];
		return $this;
	}

	public function orWhere($column, $operator, $value)
	{
		return $this->where($column, $operator, $value, $boolean = 'or');
	}

	public function groupBy($columns)
	{
		$this->groups = is_array($columns) ? $columns : func_get_args($columns);
		return $this;
	}

	public function having($column, $operator, $value, $boolean = 'and')
	{
		$this->havings[] = [$column, $operator, $value, $boolean];
		return $this;
	}

	public function orHaving($column, $operator, $value)
	{
		$this->having($column, $operator, $value, $boolean = 'or');
	}

	public function orderBy($column, $direction = 'asc')
	{
		$this->order[] = [$column, $direction];
		return $this;
	}

	public function limit($limit)
	{
		$this->limit = $limit;
		return $this;
	}

	public function offset($offset)
	{
		$this->offset = $offset;
		return $this;
	}

	//Get statement
	public function get()
	{
		//Check table
		if(!isset($this->from) || empty($this->from))
		{
			return false;
		}

		//Check distinct
		$sql = $this->distinct ? "select DISTINCT " : "select ";

		if(isset($this->columns) && is_array($this->columns))
		{
			$sql .= implode(", ", $this->columns);
		}else{
			$sql .= ' *';
		}

		$sql .= " from ".$this->from;

		//Parse join
		if(isset($this->joins) && is_array($this->joins))
		{
			foreach ($this->joins as $join) {
				switch (strtolower($join[4])) {
					case "inner":
						$sql .= " inner join";
						break;
					case "left":
						$sql .= " left join";
						break;
					case "right":
						$sql .= " right join";
						break;
					
					default:
						$sql .= " inner join";
						break;
				}
				$sql .= " $join[0] on $join[1] $join[2] $join[3] ";
			}
		}

		//Parse wheres
		if(isset($this->wheres) && is_array($this->wheres))
		{
			$sql .= " where ";
			foreach ($this->wheres as $wk => $where) {
				$sql .= " $where[0] $where[1] '$where[2]' ";
				if($wk < count($this->wheres) -1)
				{
					$sql .= (strtolower($where[3]) === 'and') ? ' AND' : ' OR';
				}
			}
		}

		//Group by
		if(isset($this->groups) && is_array($this->groups))
		{
			$sql .= " group by ".implode(",", $this->groups);
		}

		//Parse havings
		if(isset($this->havings) && is_array($this->havings))
		{
			$sql .= " HAVING ";
			foreach ($this->havings as $hk => $having) {
				$sql .= " $having[0] $having[1] $having[2] ";
				if($hk < count($this->havings) -1)
				{
					$sql .= (strtolower($having[3]) === 'and') ? ' AND' : ' OR';
				}
			}
		}

		//Order by
		if(isset($this->order) && is_array($this->order))
		{
			$sql .= " ORDER BY";
			foreach ($this->order as $ok => $order) {
				$sql .= " $order[0] $order[1] ";
				if($ok < count($this->order)-1)
				{
					$sql .= " ,";
				}
			}
		}

		//Limit
		if(isset($this->limit))
		{
			$sql .= " LIMIT $this->limit";
		}

		//Offset
		if(isset($this->offset))
		{
			$sql .= " OFFSET $this->offset";
		}

		
		$rs = Registry::getInstance()->adapter->prepare($sql);
		$rs->execute();

		$result = $rs->fetchAll();

		return $result;
	}
}