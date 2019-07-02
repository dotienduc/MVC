<?php

use App\core\Registry;

class Question 
{
	private $conn;

	public function __construct()
	{
		$this->conn = Registry::getInstance()->database;
	}

	public function insertQuestion($name, $email, $subject, $message, $status = 0)
	{
		$sql = "insert into question(name, email, subject, message, status) 
				values('$name', '$email', '$subject', '$message', '$status')
				";
		mysqli_query($this->conn, $sql);
	}

	public function getData()
	{
		$sql = "select * from question where status = '0' ";
		$rs = mysqli_query($this->conn, $sql);

		$result = array();
		while ($row = mysqli_fetch_array($rs)) {
		    $result[] = $row;
		}

		return $result;
	}

	public function getDetail($id)
	{
		$sql = "select * from question where status = '0' and id = ".$id;
		$rs = mysqli_query($this->conn, $sql);

		$row = mysqli_fetch_array($rs);

		return $row;
	}

	public function updateStatusQuestion($id_question)
	{
		$sql = "update question set status = '1' where id = ".$id_question;
		mysqli_query($this->conn, $sql);
	}
}