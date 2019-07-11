<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class Blog extends Model
{
	public $id;
	public $blog_name;
	public $author;
	public $content;
	public $time_post;
	public $image;

	public function __construct( $row = [] )
	{
		if($row != [])
		{
			$this->id 			= $row['id'];
			$this->blog_name	= $row['blog_name'];
			$this->author 		= $row['author'];
			$this->content 		= $row['content'];
			$this->time_post	= $row['time_post'];
			$this->image 		= $row['image'];
		}

		parent::__construct();
	}

	public function comments()
	{
		return $this->hasMany('App\model\Comment', ['id_blog' => $this->id]);
	}

	public function entityTable()
	{
		return "blog";
	}
}
