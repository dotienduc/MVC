<?php

use App\core\Controller;
use App\model\User;

class AuthController extends Controller
{
	private $user;

	public function __construct()
	{
		$this->user = new User;
	}

	//Function login 
	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		//Get object user
		$user = $this->user->findAll(['name' => $_POST['username'], 'password' => $_POST['password'],
				 'status' => '1']);
		
		if(count((array) $user) > 0)
		{
			$_SESSION['auth'] = $user[0]->name;
			$_SESSION['info'] = $user;

			//Redirect to dashboard page
			$this->redirect('http://localhost/mvc/public/DashboardController/dashBoard');
			exit();
		}else{

			/*
				Redirect to login page 
				if account not exists
			*/
			$this->redirect('location: http://localhost/mvc/public/DashboardController/login');
			exit();
		}
	}
}