<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class Banner extends Model
{
	public $id;
	public $name;
	public $image;
	public $text1;
	public $text2;
	public $status;

	public function __construct( $row = [] )
	{
		if( $row != [] )
		{
			$this->id 		= $row['id'];
			$this->name 	= $row['name'];
			$this->image 	= $row['image'];
			$this->text1 	= $row['text1'];
			$this->text2 	= $row['text2'];
			$this->status 	= $row['status'];
		}

		parent::__construct();
	}

	public function entityTable()
	{
		return "banner";
	}
}