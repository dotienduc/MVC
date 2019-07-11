<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class ExaminationSchedule extends Model
{
	public $id;
	public $first_name;
	public $last_name;
	public $email;
	public $phone;
	public $message;
	public $id_doctor;
	public $id_timeserving;
	public $id_subject;
	public $status ;
	public $confirmed ;
	public $confirm_code ;


	public function __construct( $row = [] )
	{
		if($row != [])
		{
			$this->id 			  = $row['id'];
			$this->first_name 	  = $row['first_name'];
			$this->last_name 	  = $row['last_name'];
			$this->email 		  = $row['email'];
			$this->phone 		  = $row['phone'];
			$this->message 		  = $row['message'];
			$this->id_subject  	  = $row['id_subject'];
			$this->id_doctor	  = $row['id_doctor'];
			$this->id_timeserving = $row['id_timeserving'];
			$this->status 		  = $row['status'];
			$this->confirmed 	  = $row['confirmed'];
			$this->confirm_code	  = $row['confirm_code'];
		}

		parent::__construct();
	}

	public function entityTable()
	{
		return "examination_schedule";
	}
}
