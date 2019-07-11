<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class Doctor extends Model
{
	public $id;
	public $name;
	public $image;
	public $id_specialist;
	public $address;
	public $phone;
	public $email;
	public $description;

	public function __construct( $row = [] )
	{
		if( $row != [] )
		{
			$this->id   			= $row['id'];
			$this->name 			= $row['name'];
			$this->image 			= $row['image'];
			$this->id_specialist	= $row['id_specialist'];
			$this->address 			= $row['address'];
			$this->phone 			= $row['phone'];
			$this->email 			= $row['email'];
			$this->description 		= $row['description'];
		}

		parent::__construct();
	}

	public function specialist()
	{
		return $this->hasOne('App\model\Specialist', ['id' => $this->id_specialist]);
	}

	public function canlendar()
	{
		return $this->hasMany('App\model\Calendar', ['id' => $this->id]);
	}

	public function entityTable()
	{
		return "doctor";
	}
}
