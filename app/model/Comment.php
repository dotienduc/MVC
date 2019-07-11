<?php 

namespace App\model;

use \InvalidArgumentException;
use App\core\Model;

class Comment extends Model
{
	public $id;
	public $parent_commnet_id;
	public $comment;
	public $comment_sender_name;
	public $id_blog;
	public $date;

	public function __construct( $row = [] )
	{
		if( $row != [] )
		{
			$this->id 					= $row['id'];
			$this->parent_commnet_id	= $row['parent_commnet_id'];
			$this->comment 				= $row['comment'];
			$this->comment_sender_name	= $row['comment_sender_name'];
			$this->id_blog 				= $row['id_blog'];
			$this->date 				= $this->getTimeAgo($row['date']);
		}

		parent::__construct();
	}

	public function blog()
	{
		return $this->hasOne('App\model\Blog', ['id' => $this->id_blog]);
	}

	public function getCommentParent(array $bind = array())
	{
		return $this->findAll($bind);
	}

	public function getTimeAgo($timestamp)
	{ 
		$time_ago 			= strtotime($timestamp);
		$current_time 		= time();
		$time_difference 	= $current_time - $time_ago;
		$seconds 			= $time_difference;
		$minutes 			= round($time_difference / 60);
		$hours           	= round($seconds / 3600);        
		$days          		= round($seconds / 86400);        
		$weeks          	= round($seconds / 604800);        
		$months          	= round($seconds / 2629440);    
		$years          	= round($seconds / 31553280); 

		if($seconds <= 60)
		{
			return "Just now";
		}else if($minutes <=60)
		{
			if($minutes == 1)
			{
				return "One mintute ago";
			}else
			{
				return $minutes . " mintutes ago";
			}
		}else if($hours <= 24)
		{	
			if($hours == 1)
			{
				return "One hour ago";
			}else
			{
				return $hours . " hours ago";
			}
		}else if($days <= 7)
		{
			if($days == 1)
			{
				return "One day ago";
			}else
			{
				return $days . " day ago";
			}
		}else if($weeks <= 4.3)
		{
			if($weeks == 1)
			{
				return "One week ago";
			}else
			{
				return $weeks . " week ago";
			}
		}else if($months <= 12)
		{
			if($months == 1)
			{
				return "One month ago";
			}else
			{
				return $months . " month ago";
			}
		}else
		{
			if($years == 1)
			{
				return "One year ago";
			}else
			{
				return $years . " year ago";
			}
		}
	}

	public function entityTable()
	{
		return "comments";
	}
}