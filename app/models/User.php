<?php


use App\core\Registry;

class User
{
	private $conn;

	public function __construct()
	{
		$this->conn = Registry::getInstance()->database;
	}

	public function getData()
	{
		$sql = "select * from users";
		$rs = mysqli_query($this->conn, $sql);
		$result = array();
		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}
		return $result;
	}
}