<?php
require_once __DIR__ . '../../../vendor/fzaninotto/faker/src/autoload.php';
require_once __DIR__ . '../../../vendor/autoload.php';

use App\connect\Connection;
use App\iplm\DoctorIplm;

class Doctor implements DoctorIplm
{
	private $conn;

	public function __construct()
	{
		$this->conn = Connection::connectDb();
	}

	// CURD Doctor
	public function insertDoctor($name, $email, $address, $id_specialist, $phone, $image, $description)
	{
		$sql = "insert into doctor(name, image, id_specialist, address, phone, email, description)
		values('".$name."', '".$image."', '".$id_specialist."', '".$address."', '".$phone."', '".$email."', '".$description."')";
		mysqli_query($this->conn, $sql);
	}

	public function editDoctor($name, $image, $id_specialist, $address, $phone, $email, $description, $id_doctor)
	{
		$sql = "update doctor set name = '".$name."', image = '".$image."', id_specialist = '".$id_specialist."', address = '".$address."', phone = '".$phone."', email = '".$email."', description = '".$description."' where id_doctor = ".$id_doctor;
		
		mysqli_query($this->conn, $sql);
	}

	public function deleteDoctor($id_doctor)
	{
		$sql = "delete from doctor where id_doctor = ".$id_doctor;
		mysqli_query($this->conn, $sql);
	}

	//End CURD Doctor

	public function getListDoctor()
	{
		$sql = "select * from doctor inner join specialist on doctor.id_specialist = specialist.id";
		$rs = mysqli_query($this->conn, $sql);
		$doctors = array();
		while($row = mysqli_fetch_array($rs))
		{
			$doctors[] = $row;
		}
		return $doctors;
	}

	public function getCalendar($id_doctor)
	{
		$sql = "select * from calendar
				inner join timeserving on timeserving.id_timeserving = calendar.id_timeserving
				where id_doctor = 
				" . $id_doctor;
		$rs = mysqli_query($this->conn, $sql);

		$calendars = array();

		while($row = mysqli_fetch_array($rs))
		{
			$calendars[] = $row;
		}
		return $calendars;
	}

	public function getDoctor($id_doctor)
	{
		$sql = "select * from doctor inner join specialist on doctor.id_specialist = specialist.id  where id_doctor = ".$id_doctor;
		$rs = mysqli_query($this->conn, $sql);
		$doctor = mysqli_fetch_array($rs);
		return $doctor;
	}

	public function getListDoctorOfSpecialist($id_specialist)
	{
		$sql = "select * from doctor where id_specialist = ".$id_specialist;
		$rs = mysqli_query($this->conn, $sql);

		$result = array();
		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}
		return $result;
	}

	public function getListSpeacialist()
	{
		$sql = "select * from specialist";
		$rs = mysqli_query($this->conn, $sql);

		$result = array();
		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}
		return $result;
	}

	public function insertAppoinment(
					$fName, $lName, $email, $phone,
					$message, $id_doctor, $id_timeserving, $id_subject,
					$confirmCode, $status = 0, $confirmed = 0
					)
	{
		$sql = "insert into 
			examination_schedule(first_name, last_name, email, 
							phone, message, id_doctor, id_timeserving,
							 id_subject, status, confirmed, confirm_code)
			values('".$fName."', '".$lName."', '".$email."', '".$phone."', '".$message."',
					 '".$id_doctor."', '".$id_timeserving."' , '".$id_subject."',
					  '".$status."', '".$confirmed."', '".$confirmCode."')";
		mysqli_query($this->conn, $sql);

		$last_id = mysqli_insert_id($this->conn);
		return $last_id;
	}

	public function getBanner()
	{
		$sql = "select * from banner where status = '1' order by id desc";
		$rs =mysqli_query($this->conn, $sql);

		$result = array();
		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}

		return $result;
	}
}