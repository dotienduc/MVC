<?php 

namespace App\core;

use \InvalidArgumentException;

class Model extends AbstractDataMapper
{

	public function __set($name, $value)
	{
		$field = strtolower($name);
		
		if(!property_exists($this, $field))
		{
			throw new InvalidArgumentException(
				"Setting the field '$field' is not valid for this entity.");
		}

		$mutator = "set" . ucfirst(strtolower($name));	
		if(method_exists($this, $mutator) &&
			is_callable(array($this, $mutator)))
		{
			is_callable($this, $mutator);
			$this->$mutator($value);
		}else
		{
			$this->field = $value;
		}

		return $this;
	}

	public function __get($name)
	{
		$field = strtolower($name);

		if(!property_exists($this, $field))
		{
			throw new InvalidArgumentException(
				"Setting the field '$field' is not valid for this entity.");
		}

		$accessor = "get" . ucfirst(strtolower($name));
		return (method_exists($this, $accessor) &&
			is_callable(array($this, $accessor))) ? $this->$accessor():
		$this->field;
	}

	public function toArray()
	{
		return get_object_vars($this);
	}

	//Create entity table 
	public function createEntity(array $row){
		return new $this( $row );
	}
}

