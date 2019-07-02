<?php
namespace App\core;

use Jenssegers\Blade\Blade;

class Controller
{
	public function __construct(){}

	public function redirect($url, $isEnd = true, $responseCode = 302)
	{
		header('location:'.$url, true, $responseCode);
		if( $isEnd )
			die();
	}

	public function render($view, $data = [])
	{
		$rootDir      			= Registry::getInstance()->config['rootDir'];

		$folder 	  			= explode(".", strtolower($view));
		$fileView     			= end($folder);
		array_pop($folder);

		$viewPath     			= $rootDir.'/app/views/'.implode("/", $folder).'';

		$cacheView    			= $rootDir.'/storage/view';

		$arraySession 			= [];

		if(isset($_SESSION['info']))
		{
			$arraySession['infoAccount'] = $_SESSION['info'];
		}

		$data 		= array_merge($data, $arraySession);

		$blade 		= new Blade($viewPath, $cacheView);

		echo $blade->make($fileView, $data);
	}

	public function middleware($role)
	{
		if($role !== 1)
		{
			header("location:javascript://history.go(-1)");
		}
	}

	public function dd($data)
	{
		echo "<pre>";
		print_r($data);
		die();
	}

	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model();
	}
}