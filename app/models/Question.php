<?php
require_once __DIR__ . '../../../vendor/fzaninotto/faker/src/autoload.php';
require_once __DIR__ . '../../../vendor/autoload.php';

use App\connect\Connection;
use App\iplm\QuestionIplm;

class Question implements QuestionIplm
{
	private $conn;

	public function __construct()
	{
		$this->conn = Connection::connectDb();
	}

	public function insertQuestion($name, $email, $subject, $message, $status = 0)
	{
		$sql = "insert into question(name, email, subject, message, status) 
				values('$name', '$email', '$subject', '$message', '$status')
				";
		mysqli_query($this->conn, $sql);
	}
}