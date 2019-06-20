<?php

require_once __DIR__ . '../../../vendor/autoload.php';

use App\connect\Connection;

class User
{
	private $conn;

	public function __construct()
	{
		$this->conn = Connection::connectDb();
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