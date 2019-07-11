<?php
namespace App;

class Authentication
{
	public static function checkAuth()
	{
		if(!$_SESSION['auth'])
		{
			header('location: http://localhost/mvc/public/DashboardController/login');
			exit();
		}
	}
}
