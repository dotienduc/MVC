<?php  

namespace App\iplm;

interface ScheduleIplm
{
	public function insertSchedule($id_doctor, $id_timeserving);
	public function editSchedule($id_doctor,  $id_timeserving, $id_timeservingBefore);
	public function delete($id_doctor, $id_timeserving);
	public function getSchedule();
	public function getTimeserving();
	public function getTimeworkOfDay($weeksday);
	public function getIdTimeserving($weeksday, $work_time);
	public function getScheduleOfDoctor($id_doctor, $weeksday);
}
