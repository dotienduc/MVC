<?php 

namespace App\core;

class Router
{

	//Controller default
	protected $controller = 'home';

	//Method default
	protected $method = 'index';

	protected $params = [];

	//This routers will store router have been registration
	private static $routers = [];

	public function __construct(){}

	//Add route when regist in file Routers of folder App 
	private static function addRoute($url)
	{
		self::$routers[] = $url;
	}

	//Function register route
	public static function register($url)
	{
		self::addRoute($url);//Add route
	}

	//Mapping 
	public function map()
	{
		$routers = static::$routers;// Get routers

		$requestURI = $this->parseURL(); // Get URL have parsed

		$checkRoute = false; 

		foreach ($routers as $route) {

			$route = explode('/', $route); 

			array_shift($route); 

			if( count($route) != count($requestURI) )
			{
				continue;
			}

			if( strcmp(strtolower($route[0]), strtolower($requestURI[0])) === 0 )
			{
				$this->controller = $route[0];

				Registry::getInstance()->controller = $this->controller;
				unset($route[0]);
			}else
				continue;

			require_once '../app/controllers/' . $this->controller . '.php';

			$this->controller = new $this->controller;

			if( strcmp(strtolower($route[1]), strtolower($requestURI[1])) === 0){
				$this->method = $requestURI[1];
				unset($route[1]);
			}
			else
				continue;

			$routeParams = $route ? array_values($route) : [];

			if( count($routeParams) === count(array_slice($requestURI, 2)) )
			{
				foreach ($routeParams as $k => $rp) {
					$this->params[] = array_slice($requestURI, 2)[$k];
				}
			}else
				continue;

			call_user_func_array([$this->controller, $this->method], $this->params);
		}

	}

	public function parseURL()
	{
		if(isset($_GET['url']))
		{
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

	//Run function map
	public function run()
	{
		$this->map();
	}
}
?>