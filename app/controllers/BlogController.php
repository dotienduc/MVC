<?php
use Jenssegers\Blade\Blade;
use App\core\Controller;

class BlogController extends Controller
{
	private $blog;

	public function __construct()
	{
		$this->blog = $this->model('Blog');
	}

	//Function display list blog
	public function blog()
	{
		//Get list blog from model Blog
		$blogs = $this->blog->getListBlog();

		//Get list comment from model Blog
		$listComment = $this->blog->listComments();

		$this->render('home.danhSachBlog', ['blogs' => $blogs, 'listComment' => $listComment]);
	}

	//Function display detail blog
	public function getBlog($id)
	{
		//Get list blog from Model Blog
		$blog = $this->blog->getDetailBlog($id);

		//Get list recentBlog from Model Blog
		$recentBlogs = $this->blog->getRecentPosts($id);

		$this->render('home.chiTietBlog', ['blog' => $blog, 'id' => $id,
			'recentBlogs' => $recentBlogs
		]);
	}

	//Function display list comment
	public function getListComments()
	{
		//Get parent comment from model Blog
		$listComment = $this->blog->getComments($_POST['id_blog']);


		//Get all comment from model Blog
		$comments = $this->blog->getAllComment($_POST['id_blog']);

		$this->render('home.dataAjax.loadDataComment', ['listComment' => $listComment, 
			'comments' => $comments
		]);
	}

	//Function add comment
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

			//Add comment to database 
			$this->blog->addComment($parent_id_comment, $comment, $name, $id_blog, $date);
			$error = '<label class="alert alert-success">Comment Added</label>';
		}

		$data = array(
			'error' => $error
		);

		echo json_encode($data);
	}


}