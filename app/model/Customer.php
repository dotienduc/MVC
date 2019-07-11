<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class Customer extends Model
{
	public $id;
	public $fname;
	public $lname;
	public $address;
	public $email;
	public $gender;
	public $phone;
	public $note;

	public function __construct( $row = [] )
	{
		if($row != [])
		{
			$this->id 		= $row['id'];
			$this->fname 	= $row['fname'];
			$this->lname 	= $row['lname'];
			$this->address 	= $row['address'];
			$this->email 	= $row['email'];
			$this->gender 	= $row['gender'];
			$this->phone 	= $row['phone'];
			$this->note 	= $row['note'];
		}

		parent::__construct();
	}

	public function entityTable()
	{
		return "customers";
	}
}