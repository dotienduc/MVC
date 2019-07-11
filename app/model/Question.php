<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class Question extends Model
{
	public $id;
	public $name;
	public $email;
	public $subject;
	public $message;
	public $status;

	public function __construct( $row = [] )
	{
		if($row != [])
		{
			$this->id 		= $row['id'];
			$this->name 	= $row['name'];
			$this->email 	= $row['email'];
			$this->subject  = $row['subject'];
			$this->message  = $row['message'];
			$this->status 	= $row['status'];
		}

		parent::__construct();
	}

	public function entityTable()
	{
		return "question";
	}
}