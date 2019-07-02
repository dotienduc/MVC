<?php
namespace App\core;

use App\connect\Connection;

class App
{
	private static $router;
	private static $instance;

	private function __construct(){}

	public static function getInstance()
	{
		if(!isset(self::$instance)){
			self::$router = new Router();
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function run($config)
	{
		Registry::getInstance()->config   = $config;
		Registry::getInstance()->database = Connection::connectDb();
		self::$router->run();
	}

}