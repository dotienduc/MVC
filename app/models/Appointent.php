<?php 

require_once __DIR__ . '../../../vendor/autoload.php';

use App\connect\Connection;
use App\iplm\AppointentIplm;

class Appointent implements AppointentIplm
{
	private $conn;

	public function __construct()
	{
		$this->conn = Connection::connectDb();
	}

	public function getListAppointent()
	{
		$sql = "select e.id, e.first_name, e.last_name, e.email, e.phone, e.message, e.status,
		e.id_doctor, e.id_timeserving, e.id_subject 
		,d.name, s.name_specialist, t.weeksday, t.work_time
		from examination_schedule as e
		inner join doctor as d on e.id_doctor = d.id_doctor
		inner join specialist as s on s.id = e.id_subject
		inner join timeserving as t on t.id_timeserving = e.id_timeserving
		where e.confirmed = '1'
		";
		$rs = mysqli_query($this->conn, $sql);
		$result = array();
		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}
		return $result;
	}

	public function insertData($first_name, $last_name, $email, $phone,
						 $message, $id_doctor, $id_timeserving, $id_subject,
						  $status = 0, $confirmed = 1, $confirm_code = 0)
	{
		$sql = "insert into examination_schedule(first_name, last_name, email, phone, message, id_doctor, id_timeserving, id_subject, status, $confirmed, $confirm_code)
			values('".$first_name."', '".$last_name."', '".$email."', '".$phone."',
			 '".$message."', '".$id_doctor."', '".$id_timeserving."',
			  '".$id_subject."', '".$status."', '".$confirmed."', '".$confirm_code."')";
		mysqli_query($this->conn, $sql);
	}

	public function editData($first_name, $last_name, $email, $phone,
						  $id_doctor, $id_timeserving, $id_subject, $id_appointent, $status = 0)
	{
		$sql = "update examination_schedule set first_name = '".$first_name."', last_name = '".$last_name."', email = '".$email."', phone = '".$phone."', id_doctor = '".$id_doctor."', id_timeserving = '".$id_timeserving."', id_subject = '".$id_subject."', 
		status = '".$status."' where id = ". $id_appointent;
		mysqli_query($this->conn, $sql);
	}

	public function deleteData($id_appointent)
	{
		mysqli_query($this->conn, "delete from examination_schedule where id = '".$id_appointent."'");
	}

	public function confirm($id, $token)
	{
		$sql = "select * from examination_schedule where id = ".$id;
		$rs = mysqli_query($this->conn, $sql);

		while($row = mysqli_fetch_array($rs))
		{
			$db_token = $row['confirm_code'];
		}
		if($token == $db_token)
		{
			mysqli_query($this->conn, "update examination_schedule set confirmed = '1', confirm_code = '0' where id = '".$id."'");
			header('location: http://localhost/mvc/public/home/index');
		}
	}
}

?>