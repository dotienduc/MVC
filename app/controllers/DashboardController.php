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

		$blade = new Blade('../app/views/admin', '../app/cache');

		echo $blade->make('dashboard', ['infoAccount' => $_SESSION['info']]);
	}

	//Function display form login
	public function login()
	{
		$blade = new Blade('../app/views/admin', '../app/cache');

		echo $blade->make('login');
	}

	//Function display form register
	public function register()
	{
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
		$blade = new Blade('../app/views/admin', '../app/cache');

		echo $blade->make('register');
	}
	

	//Function logout user
	public function logout()
	{
		unset($_SESSION['auth']);
		header('location: http://localhost/mvc/public/DashboardController/login');
		exit();
	}

	//Function display table users
	public function listAccount()
	{
		$blade = new Blade('../app/views/admin', '../app/cache');

		echo $blade->make('listAccount', ['infoAccount' => $_SESSION['info']]);
	}
}


