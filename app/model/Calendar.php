<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class Calendar extends Model
{
	public $id;
	public $id_doctor;
	public $id_timeserving;

	public function __construct( $row = [] )
	{
		if($row != [])
		{
			$this->id 				= $row['id'];
			$this->id_doctor		= $row['id_doctor'];
			$this->id_timeserving	= $row['id_timeserving'];
		}
		parent::__construct();
	}

	public function doctor()
	{
		return $this->hasOne('App\model\Doctor', ['id' => $this->id_doctor]);
	}

	public function timeserving()
	{
		return $this->hasOne('App\model\Timeserving', ['id_timeserving' => $this->id_timeserving]);
	}

	public function entityTable()
	{
		return "calendar";
	}
}