<?php
use Jenssegers\Blade\Blade;
use App\core\Controller;

class ScheduleController extends Controller
{
	private $doctor;
	private $schedule;

	public function __construct()
	{
		$this->doctor = $this->model('Doctor');
		$this->schedule = $this->model('Schedule');
	}

	//Function display table schedule
	public function listSchedule()
	{
		//Get timeserving from model Schedule
		$timeserving = $this->schedule->getTimeserving();

		$blade = new Blade('../app/views/admin', '../app/cache');

		echo $blade->make('scheduleList', ['timeserving' => $timeserving]);
	}

	//Function display form add schedule
	public function formSchedule()
	{
		//Get specialist from model Doctor
		$specialist = $this->doctor->getListSpeacialist();

		//Get timeserving from model Schedule
		$timeserving = $this->schedule->getTimeserving();

		$blade = new Blade('../app/views/admin', '../app/cache');

		echo $blade->make('formSchedule', ['specialist' => $specialist, 'timeserving' => $timeserving]);
	}

	//Function perform multiSelect DropBox Doctor
	public function multiSelect()
	{
		//Get list doctor of Specialist from model Doctor
		$listDoctor = $this->doctor->getListDoctorOfSpecialist($_POST['query']);

		$output = "";
		foreach ($listDoctor as $row) {
			$output .= "<option value='".$row['id_doctor']."' >".$row['name']."</option>";
		}
		echo $output;
	}

	//Function insert Schedule
	public function insertSchedule()
	{
		$id_doctor = $_POST['name'];
		$weeksday = $_POST['weeksday'];
		$work_time = $_POST['work_time'];

		//Get id timeserving of Table Timeserving in database from model Schedule
		$id_timeserving = $this->schedule->getIdTimeserving($weeksday, $work_time);


		//Insert Schedule to database
		$this->schedule->insertSchedule($id_doctor, $id_timeserving['id_timeserving']);

		header('location: http://localhost/mvc/public/ScheduleController/listSchedule');
	}

	//Function fetch data list schedule 
	public function fetch_data()
	{
		//Get list schedule from model Schedule
		$schedule = $this->schedule->getSchedule();

		//Get specialist from model Doctor
		$specialist = $this->doctor->getListSpeacialist();

		$blade = new Blade('../app/views/admin/dataAjax', '../app/cache');

		echo $blade->make('TableSchedule', ['schedule' => $schedule, 'specialist' => $specialist]);
	}

	//Function edit timeserving
	public function editTimeserving()
	{
		$id_timeservingBefore = $_POST['hidden_idTimeserving'];
		$weeksday = $_POST['weeksday'];
		$work_time = $_POST['work_time'];
		$id_doctor = $_POST['hidden_idDoctor'];

		//Get id timeserving from table_timeserving
		$id_timeserving = $this->schedule->getIdTimeserving($weeksday, $work_time);

		//Edit schedule of database
		$this->schedule->editSchedule($id_doctor,$id_timeserving['id_timeserving'], $id_timeservingBefore);

		$success = "<div class='alert alert-success'>Edit successed</div>";

		$data = array(
			'success' => $success
		);

		echo json_encode($data);
	}

	//Function delete Schedule
	public function deleteSchedule()
	{
		$id_timeserving = $_POST['id_timeserving'];
		$id_doctor = $_POST['id_doctor'];

		//Delete schedule to database calendar
		$this->schedule->delete($id_doctor, $id_timeserving);
		$success = "<div class='alert alert-success'>Delete successed</div>";

		$data = array(
			'success' => $success
		);

		echo json_encode($data);
	}

	//Function select timework od Doctor
	public function selectTimework()
	{
		$time_work  = $_POST['query'];
		$time = $_POST['time'];
		$output = "";

		//Get time work of day from database
		$times = $this->schedule->getTimeworkOfDay($time_work);
		$output .= "<option>Chọn giờ làm việc</option>";
		foreach($times as $row)
		{
			if($row['work_time'] == $time){
				continue;
			}
			$output .= "<option value='".$row['work_time']."'>".$row['work_time']."</option>";
		}
		echo $output;
	}

	//Function filter timework of doctor 
	public function filterFormSchedule()
	{
		$id_doctor = $_POST['id_doctor'];
		$weeksday = $_POST['query'];
		$output = "";

		//Get time work of day from model Schedule
		$times = $this->schedule->getTimeworkOfDay($weeksday);

		//Get schedule of doctor selected
		$scheduleOfDoctor = $this->schedule->getScheduleOfDoctor($id_doctor, $weeksday);
		$output .= "<option>Chọn giờ làm việc</option>";
		$value = "";
		foreach ($times as $time) {
			foreach ($scheduleOfDoctor as $row) {
				if($row['work_time'] == $time['work_time'])
				{
					$value = $row['work_time'];
				}
			}
			if($value == $time['work_time'])
			{
				continue;
			}
			$output .= "<option value='".$time['work_time']."'>".$time['work_time']."</option>";
		}
		echo $output;
	}
}