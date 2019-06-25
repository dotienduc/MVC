<?php 
namespace App\iplm;

interface AppointentIplm
{
	public function getListAppointent();
	public function insertData($first_name, $last_name, $email, $phone,
						 $message, $id_doctor, $id_timeserving, $id_subject,
						  $status = 0, $confirmed = 1, $confirm_code = 0);
	public function editData($first_name, $last_name, $email, $phone,
						  $id_doctor, $id_timeserving, $id_subject, $id_appointent, $status = 0);
	public function deleteData($id_appointent);
}
