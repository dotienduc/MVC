<?php

use Jenssegers\Blade\Blade;
use App\core\Controller;
use App\Authentication;

class DashboardController extends Controller
{
	private $auth;

	public function __construct()
	{
		$this->auth = $this->model('Auth');
	}

	//Function display dashboard
	public function dashBoard()
	{
		//Check user session
		Authentication::checkAuth();

		$this->render('admin.dashboard');
	}

	//Function display form login
	public function login()
	{
		if(isset($_SESSION['info']))
		{
			$this->middleware($_SESSION['info']['role']);
		}
		$this->render('admin.login');
	}

	//Function display form register
	public function register()
	{
		if(isset($_SESSION['info']))
		{
			$this->middleware($_SESSION['info']['role']);
		}
		if(isset($_POST['register']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];

			//Add user to database
			$this->auth->addUser($username, $email, $password);
			$_SESSION['auth'] = $username;
			header('location: http://localhost/mvc/public/DashboardController/dashBoard');
			exit();
		}

		$this->render('admin.register');
	}
	

	//Function logout user
	public function logout()
	{
		unset($_SESSION['auth']);
		session_destroy();
		header('location: http://localhost/mvc/public/DashboardController/login');
		exit();
	}

	//Function display table users
	public function listAccount()
	{
		if(isset($_SESSION['info']))
		{
			$this->middleware($_SESSION['info']['role']);
		}
		$this->render('admin.listAccount', ['infoAccount' => $_SESSION['info']]);
	}
}


