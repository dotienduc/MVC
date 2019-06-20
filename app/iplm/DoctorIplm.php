<?php

namespace App\iplm;

interface DoctorIplm
{
	public function insertDoctor($name, $email, $address, $id_specialist, $phone, $image, $description);
	public function editDoctor($name, $image, $id_specialist, $address, $phone, $email, $description, $id_doctor);
	public function deleteDoctor($id_doctor);
	public function getListDoctor();
	public function getCalendar($id_doctor);
	public function getDoctor($id_doctor);
	public function getListDoctorOfSpecialist($id_specialist);
	public function getListSpeacialist();
	public function insertAppoinment(
					$fName, $lName, $email, $phone,
					$message, $id_doctor, $id_timeserving, $id_subject, $status = 0
					);
}
