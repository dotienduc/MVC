<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class BillDetail extends Model
{
	public $id;
	public $id_bill;
	public $id_product;
	public $quantity;
	public $price;

	public function __construct( $row = [] )
	{
		if($row != [])
		{
			$this->id 			= $row['id'];
			$this->id_bill		= $row['id_bill'];
			$this->id_product	= $row['id_product'];
			$this->quantity 	= $row['quantity'];
			$this->price 		= $row['price'];
		}

		parent::__construct();
	}

	public function bill()
	{
		return $this->hasOne('App\model\Bill', ['id' => $id_bill]);
	}

	public function entityTable()
	{
		return "bill_detail";
	}
}