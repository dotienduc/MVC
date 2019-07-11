<?php 
namespace App\model;

use \InvalidArgumentException;
use App\core\Model;


class Products extends Model
{
	public $id;
	public $name;
	public $description;
	public $unit_price;
	public $promotion_price;
	public $image;
	public $status;

	public function __construct( $row = [] )
	{
		if( $row != [] )
		{
			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->description = $row['description'];
			$this->unit_price = $row['unit_price'];
			$this->promotion_price = $row['promotion_price'];
			$this->image = $row['image'];
			$this->status = $row['status'];
		}

		parent::__construct();
	}

	public function entityTable()
	{
		return "products";
	}
}
