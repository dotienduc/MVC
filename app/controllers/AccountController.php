<?php
use Jenssegers\Blade\Blade;
use App\core\Controller;

class AccountController extends Controller
{
	private $account;
	private $auth;

	public function __construct()
	{
		if(isset($_SESSION['info']))
		{
			$this->middleware($_SESSION['info']['role']);
		}
		$this->account = $this->model('User');
		$this->auth = $this->model('Auth');
	}

	//Load data list users from model User
	public function fetch_data()
	{
		$accounts = $this->account->getData();

		$this->render('admin.dataAjax.TableAccount', ['accounts' => $accounts]);
	}

	//function CURD user
	public function actionAccount()
	{
		if(isset($_POST['action'])){
			if($_POST['action'] == 'add')
			{
				$name = $_POST['name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$password = $_POST['password'];
				$address = $_POST['address'];
				$role = $_POST['role'];

				$this->auth->addUser($name, $email, $password, $phone, $address, $role);

				$message = "<div class='alert alert-success'>Add account successed</div>";
			}
			if($_POST['action'] == 'edit')
			{
				$id_account = $_POST['id_account'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$address = $_POST['address'];
				$role = $_POST['role'];
				$status = $_POST['status-value'];

				$this->auth->editUser($id_account, $name, $email, $phone, $address, $role, $status);

				$message = "<div class='alert alert-success'>Edit account successed</div>";
			}
			if($_POST['action'] == 'delete')
			{
				$id_account = $_POST['id_account'];
				$this->auth->deleteUser($id_account);
				$message = "<div class='alert alert-success'>Delete account successed</div>";
			}
		}

		$data = array(
			'success' => $message
		);
		echo json_encode($data);
	}
}