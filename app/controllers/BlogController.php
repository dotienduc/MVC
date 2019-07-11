<?php
use Jenssegers\Blade\Blade;
use App\core\Controller;

use App\LibraryDatabase\QueryBuilder;
use App\model\Blog;
use App\model\Comment;

class BlogController extends Controller
{
	private $blog;
	private $comment;

	public function __construct()
	{
		$this->blog 	= new Blog;
		$this->comment 	= new Comment;
	}

	//Display list blog
	public function blog()
	{
		//Get all data object blog
		$blogs 		 	= $this->blog->findAll();

		//Get all data object comment
		$listComments  	= $this->comment->findAll();

		$this->render('home.danhSachBlog', ['blogs' => $blogs, 'listComment' => $listComments]);
	}

	//Display detail blog
	public function getBlog($id)
	{
		//Get data object blog follow by Id
		$blog 			= $this->blog->findbyId(['id' => $id]);

		$recentBlogs 	= QueryBuilder::table('blog')
						->where('id', '!=', $id)
						->orderBy('id', 'desc')
						->limit(3)
						->get();

		$this->render('home.chiTietBlog', ['blog' => $blog, 'id' => $id,
			'recentBlogs' => $recentBlogs]);
	}

	//Display list comment
	public function getListComments()
	{
		//Get detail data object blog follow Id
		$blog = $this->blog->findById(['id' => $_POST['id_blog']]);

		//Get comment parent
		$listComment = $this->comment->getCommentParent(['id_blog' => $blog->id, 'parent_commnet_id' => 0]);

		//Get all comment of blog 
		$comments = $this->blog->findById(['id' => $_POST['id_blog']])->comments();

		$this->render('home.dataAjax.loadDataComment', ['listComment' => $listComment, 
			'comments' => $comments
		]);
	}

	//Add comment
	public function addComment()
	{
		$name = "";
		$comment = "";
		$parent_id_comment = $_POST['hidden_id'];
		$id_blog = $_POST['id_blog'];
		$date = date("Y-m-d H:i:s");

		$error = "";

		if(empty($_POST['comment_sender_name']))
		{
			$error .= "<p class='alert alert-danger'>Name is required</p>";
		}else
		{
			$name = $_POST['comment_sender_name'];
		}

		if(empty($_POST['comment']))
		{
			$error .= "<p class='alert alert-danger'>Comment is required</p>";
		}else
		{
			$comment = $_POST['comment'];
		}

		if($error == "")
		{
			//Insert comment 
			$this->comment->parent_commnet_id 		= $parent_id_comment;
			$this->comment->comment           		= $comment;
			$this->comment->comment_sender_name	= $name;
			$this->comment->id_blog 				= $id_blog;
			$this->comment->date 					= $date;
			
			$this->comment->save();
			$error = '<label class="alert alert-success">Comment Added</label>';
		}

		$data = array(
			'error' => $error
		);

		echo json_encode($data);
	}


}