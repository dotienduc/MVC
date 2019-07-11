<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class User extends Model
{
	public $id;
	public $name;
	public $email;
	public $phone;
	public $password;
	public $address;
	public $role;
	public $status;

	public function __construct( $row = [] )
	{
		if($row != [])
		{
			$this->id 		= $row['id'];
			$this->name 	= $row['name'];
			$this->email  	= $row['email'];
			$this->phone 	= $row['phone'];
			$this->password = $row['password'];
			$this->address 	= $row['address'];
			$this->role 	= $row['role'];
			$this->status 	= $row['status'];
		}

		parent::__construct();
	}

	public function entityTable()
	{
		return "users";
	}
}