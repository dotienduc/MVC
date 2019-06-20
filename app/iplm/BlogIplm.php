<?php

namespace App\iplm;

interface BlogIplm
{
	public function insertFakeData();
	public function getListBlog();
	public function getDetailBlog($id_blog);
	public function getRecentPosts($id_blog);
	public function getComments($id_blog);
	public function addComment($parent_commnet_id, $comment, 
		$comment_sender_name, $id_blog, $date_time);
	public function getAllComment($id_blog);
	public function getTimeAgo($timestamp);
	public function listComments();
}
