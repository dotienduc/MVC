<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class TimeServing extends Model
{
	public $id_timeserving;
	public $weeksday;
	public $work_time;

	public function __construct( $row = [] )
	{
		if($row != [])
		{
			$this->id_timeserving = $row['id_timeserving'];
			$this->weeksday		  = $row['weeksday'];
			$this->work_time	  = $row['work_time'];
		}

		parent::__construct();
	}

	public function calendars()
	{
		return $this->hasMany('App\model\Calendar', ['id_timeserving' => $this->id_timeserving]);
	}

	public function entityTable()
	{
		return "timeserving";
	}
}
