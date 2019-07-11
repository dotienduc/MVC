<?php

use Jenssegers\Blade\Blade;
use App\core\Controller;
use App\Authentication;

use App\model\User;

class DashboardController extends Controller
{
	private $user;

	public function __construct()
	{
		$this->user = new User;
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
			/*
				Redirect to last page when request invalid
			*/
			$this->redirect('javascript://history.go(-1)');
		}

		$this->render('admin.login');
	}

	//Display form register
	public function register()
	{
		if(isset($_SESSION['info']))
		{
			$this->redirect('javascript://history.go(-1)');
		}

		if(isset($_POST['register']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];

			//Insert new object user;
			$this->user->name  		= $_POST['username'];
			$this->user->password 	= $_POST['password'];
			$this->user->email 		= $_POST['email'];

			$this->user->save();

			//Redirect to login page
			$this->redirect('http://localhost/mvc/public/DashboardController/login');
			exit();
		}

		$this->render('admin.register');
	}
	

	//Logout user
	public function logout()
	{
		unset($_SESSION['auth']);
		session_destroy();
		$this->redirect('http://localhost/mvc/public/DashboardController/login');
		exit();
	}

	//Display table users
	public function listAccount()
	{
		if(isset($_SESSION['info']))
		{
			$this->middleware($_SESSION['info'][0]->role);
		}
		
		$this->render('admin.listAccount', ['infoAccount' => $_SESSION['info']]);
	}
}


