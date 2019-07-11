<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class Specialist extends Model
{
	public $id;
	public $name_specialist;

	public function __construct( $row = [] )
	{
		if($row != [])
		{
			$this->id 				= $row['id'];
			$this->name_specialist  = $row['name_specialist'];
		}

		parent::__construct();
	}

	public function doctors()
	{
		return $this->hasMany('App\model\Doctor', ['id_specialist' => $this->id]);
	}

	public function entityTable()
	{
		return "specialist";
	}
}
