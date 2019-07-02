<?php

use App\core\Registry;

class Auth 
{
	private $conn;

	public function __construct()
	{
		$this->conn = Registry::getInstance()->database;
	}

	public function checkAuth($username, $password)
	{
		$sql = "select * from users where name = '".$username."' and password = '".$password."' and status = 1";
		$result = mysqli_query($this->conn, $sql);
		if(mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_array($result);
			return $row;
		}else
		{
			return [];
		}
	}

	public function addUser($username, $email, $password, $phone = "",
		$address = "", $role = 0, $status = 0)
	{
		$sql = "insert into users(name, email, phone, password, address, role, status)
		values('".$username."', '".$email."', '".$phone."', '".$password."',
		'".$address."', '".$role."', '".$status."')";
		mysqli_query($this->conn, $sql);
	}

	public function editUser($id_account, $username, $email, $phone = "",
		$address = "", $role = 0, $status = 0)
	{
		$sql = "update users set name = '".$username."', email = '".$email."',
		phone = '".$phone."', address= '".$address."', role='".$role."',
		status='".$status."' where id = ".$id_account;
		mysqli_query($this->conn, $sql);
	}

	public function deleteUser($id_account)
	{
		$sql = "delete from users where id = ".$id_account;
		mysqli_query($this->conn, $sql);
	}
}