<?php
use Jenssegers\Blade\Blade;
use App\core\Controller;

use App\model\User;

class AccountController extends Controller
{
	private $user;

	public function __construct()
	{
		//Middleware request
		if(isset($_SESSION['info']))
		{
			$this->middleware($_SESSION['info'][0]->role);
		}
		$this->user = new User;
	}

	//Load data list users 
	public function fetch_data()
	{
		//Get all account 
		$accounts = $this->user->findAll();

		$this->render('admin.dataAjax.TableAccount', ['accounts' => $accounts]);
	}

	//function CURD user
	public function actionAccount()
	{
		if(isset($_POST['action'])){
			if($_POST['action'] == 'add')
			{

				//Save object user to database
				$this->user->name 		= $_POST['name'];
				$this->user->email 		= $_POST['email'];
				$this->user->phone 		= $_POST['phone'];
				$this->user->password 	= $_POST['password'];
				$this->user->address 	= $_POST['address'];
				$this->user->role 		= $_POST['role'];
				$this->user->status 	= '1';

				$this->user->save();

				$message = "<div class='alert alert-success'>Add account successed</div>";
			}
			if($_POST['action'] == 'edit')
			{

				//Edit data of user's object to database
				$user = $this->user->findById(['id' => $_POST['id_account']]);
				$user->name 		= $_POST['name'];
				$user->email 		= $_POST['email'];
				$user->phone 		= $_POST['phone'];
				$user->password 	= $_POST['password'];
				$user->address 		= $_POST['address'];
				$user->role 		= $_POST['role'];
				$user->status 		= '1';

				$user->update();

				$message = "<div class='alert alert-success'>Edit account successed</div>";
			}
			if($_POST['action'] == 'delete')
			{

				//Delete user's object 
				$user = $this->user->findById(['id' => $_POST['id_account']]);

				$user->delete();

				$message = "<div class='alert alert-success'>Delete account successed</div>";
			}
		}

		$data = array(
			'success' => $message
		);
		echo json_encode($data);
	}
}