<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class Bill extends Model
{
	public $id;
	public $id_customer;
	public $date_order;
	public $total;
	public $note;
	public $status;

	public function __construct( $row = [] )
	{
		if($row != [])
		{
			$this->id 				= $row['id'];
			$this->id_customer		= $row['id_customer'];
			$this->date_order		= $row['date_order'];
			$this->total 			= $row['total'];
			$this->note 			= $row['note'];
			$this->status 			= $row['status'];
		}

		parent::__construct();
	}

	public function billDetail()
	{
		return $this->hasMany('App\model\BillDetail', ['id_bill' => $this->id]);
	}

	public function entityTable()
	{
		return "bills";
	}
}