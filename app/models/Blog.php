<?php

use App\core\Registry;

class Blog 
{
	private $conn;

	public function __construct()
	{
		$this->conn = Registry::getInstance()->database;
	}

	public function insertFakeData()
	{
		$faker = \Faker\Factory::create();
		$blog_name = $faker->sentence($nbWords = 3, $variableNbWords = true);
		$content = $faker->realText($maxNbChars = 2000, $indexSize = 2);
		$date = $faker->date($format = 'Y-m-d', $max = 'now');
		foreach (range(1, 6) as $x) {
			mysqli_query($this->conn, "insert into blog(blog_name, author, content) values('{$faker->name}', '{$faker->name}', '{$faker->text}')");
		}
	}

	public function getListBlog()
	{
		$sql = "select * from blog order by id desc";
		$rs = mysqli_query($this->conn, $sql);

		$blogs = array();
		while($row = mysqli_fetch_array($rs))
		{
			$blogs[] = $row;
		}
		return $blogs;
	}

	public function getDetailBlog($id_blog)
	{
		$sql = "select * from blog where id = ".$id_blog;
		$rs = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_array($rs);

		return $row;
	}

	public function getRecentPosts($id_blog)
	{
		$sql = "select * from blog where not id = ".$id_blog." order by id desc limit 0,3";
		$rs = mysqli_query($this->conn, $sql);

		$recentBlogs = array();
		while($row = mysqli_fetch_array($rs))
		{
			$recentBlogs[] = $row;
		}
		return $recentBlogs;
	}

	public function getComments($id_blog)
	{
		$sql = "select * from comments where parent_commnet_id = '0'
		and id_blog = '" . $id_blog . "'  order by id desc";
		$rs = mysqli_query($this->conn, $sql);
		date_default_timezone_set('Asia/Ho_Chi_Minh');  
		$listComments = array();
		$result = array();
		while ($row = mysqli_fetch_array($rs)) {
			$listComments['id'] = $row['id'];
			$listComments['parent_commnet_id'] = $row['parent_commnet_id'];
			$listComments['comment'] = $row['comment'];
			$listComments['comment_sender_name'] = $row['comment_sender_name'];
			$listComments['date'] = $this->getTimeAgo($row['date']);
			$listComments['id_blog'] = $row['id_blog'];
			$result[] = $listComments;
		}

		return $result;
	}

	public function addComment($parent_commnet_id, $comment, 
		$comment_sender_name, $id_blog, $date_time)
	{
		$sql = "insert into comments(parent_commnet_id, comment, comment_sender_name, id_blog, date)
		values('" . $parent_commnet_id . "', '" . $comment . "', '" . $comment_sender_name . "', '" . $id_blog . "', '".$date_time."')
		";
		mysqli_query($this->conn, $sql);
	}

	public function getAllComment($id_blog)
	{
		$sql = "select * from comments where id_blog = ".$id_blog;
		$rs = mysqli_query($this->conn, $sql); 
		$comments = array();
		$result = array();
		while($row = mysqli_fetch_array($rs))
		{
			$comments['id'] = $row['id'];
			$comments['parent_commnet_id'] = $row['parent_commnet_id'];
			$comments['comment'] = $row['comment'];
			$comments['comment_sender_name'] = $row['comment_sender_name'];
			$comments['date'] = $this->getTimeAgo($row['date']);
			$comments['id_blog'] = $row['id_blog'];
			$result[] = $comments;
		}

		return $result;
	}

	public function getTimeAgo($timestamp)
	{ 
		$time_ago = strtotime($timestamp);
		$current_time = time();
		$time_difference = $current_time - $time_ago;
		$seconds = $time_difference;
		$minutes = round($time_difference / 60);
		$hours           = round($seconds / 3600);        
      	$days          = round($seconds / 86400);        
      	$weeks          = round($seconds / 604800);        
      	$months          = round($seconds / 2629440);    
      	$years          = round($seconds / 31553280); 

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

  	public function listComments()
  	{
  		$sql = "select * from comments";
  		$rs = mysqli_query($this->conn, $sql);

  		$result = array();
  		while($row = mysqli_fetch_array($rs))
  		{
  			$result[] = $row;
  		}
  		return $result;
  	}
}