<?php

use App\core\Registry;

class Schedule
{
	private $conn;

	public function __construct()
	{
		$this->conn = Registry::getInstance()->database;
	}

	//CURD Schedule
	public function insertSchedule($id_doctor, $id_timeserving)
	{
		$sql2 = "insert into calendar(id_doctor, id_timeserving) 
		values('".$id_doctor."', '".$id_timeserving."')";
		mysqli_query($this->conn, $sql2);
	}

	public function editSchedule($id_doctor,  $id_timeserving, $id_timeservingBefore)
	{
		$sql = "update calendar set id_timeserving = '".$id_timeserving."' 
		where id_doctor = '".$id_doctor."' and id_timeserving = '".$id_timeservingBefore."'
		";
		mysqli_query($this->conn, $sql);
	}

	public function delete($id_doctor, $id_timeserving)
	{
		$sql = "delete from calendar where id_doctor = '".$id_doctor."' and id_timeserving = '".$id_timeserving."'";
		mysqli_query($this->conn, $sql);
	}

	//End CURD Schedule

	public function getSchedule()
	{
		$sql = "select * from calendar inner join timeserving on calendar.id_timeserving = timeserving.id_timeserving
		inner join doctor on doctor.id_doctor = calendar.id_doctor
		";
		$rs = mysqli_query($this->conn, $sql);
		$result = array();
		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}
		return $result;
	}

	public function getTimeserving()
	{
		$sql = "select * from timeserving group by weeksday";
		$rs = mysqli_query($this->conn, $sql);
		$result = array();
		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}
		return $result;
	}

	public function getTimeworkOfDay($weeksday)
	{
		$sql = "select * from timeserving where weeksday = '".$weeksday."' group by work_time";
		$rs = mysqli_query($this->conn, $sql);
		if(mysqli_num_rows($rs) > 0)
		{
			$result = array();
			while($row = mysqli_fetch_array($rs))
			{
				$result[] = $row;
			}
			return $result;
		}else{
			return "not ok";
		}
	}

	public function getIdTimeserving($weeksday, $work_time)
	{
		$sql = "select id_timeserving from timeserving 
		where weeksday = '".$weeksday."' and work_time = '".$work_time."'";
		$id_timeserving = mysqli_fetch_array(mysqli_query($this->conn, $sql));
		return $id_timeserving;
	}

	public function getScheduleOfDoctor($id_doctor, $weeksday)
	{
		$sql = "select timeserving.work_time from calendar inner join timeserving on calendar.id_timeserving = timeserving.id_timeserving where id_doctor = '".$id_doctor."' and weeksday = '".$weeksday."' ";
		$rs = mysqli_query($this->conn, $sql);
		$result = array();
		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}
		return $result;
	}
}