<?php

use App\core\Controller;

class AuthController extends Controller
{
	private $auth;

	public function __construct()
	{
		$this->auth = $this->model('Auth');
	}

	//Function login 
	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($this->auth->checkAuth($username, $password) !== [])
		{
			$_SESSION['auth'] = $username;
			$_SESSION['info'] = $this->auth->checkAuth($username, $password);
			header('location: http://localhost/mvc/public/DashboardController/dashBoard');
			exit();
		}else{
			header('location: http://localhost/mvc/public/DashboardController/login');
			exit();
		}
	}
}