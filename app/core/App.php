<?php
namespace App\core;

use App\connect\Connection;
use App\LibraryDatabase\PdoAdapter;

class App
{
	private static $router;

	/**
     * @var Singleton
     */
	private static $instance;

	private function __construct(){}

	/**
     * gets the instance via lazy initialization
     */
	public static function getInstance()
	{
		if(!isset(self::$instance)){
			self::$router = new Router();
			self::$instance = new self;
		}
		return self::$instance;
	}


	/**
	* Get config 
	* Get connect db 
	* Run function of Router in folder Core
	*/
	public function run($config)
	{
		Registry::getInstance()->config   = $config;
		Registry::getInstance()->adapter = new PdoAdapter("mysql:dbname=mvc;charset=utf8", "root", "");
		self::$router->run();
	}

}