<?php
use Jenssegers\Blade\Blade;
use App\core\Controller;
use App\LibraryDatabase\QueryBuilder;

use App\model\Timeserving;
use App\model\Specialist;
use App\model\Calendar;
use App\model\Doctor;

class ScheduleController extends Controller
{
	private $doctor;
	private $schedule;
	private $specialist;
	private $calendar;

	public function __construct()
	{
		$this->doctor = new Doctor;
		$this->specialist = new Specialist;
		$this->calendar = new Calendar;
	}

	//Display table schedule
	public function listSchedule()
	{
		$timeserving = QueryBuilder::table('timeserving')->groupBy('weeksday')->get();

		$this->render('admin.scheduleList', ['timeserving' => $timeserving]);
	}

	//Display form add schedule
	public function formSchedule()
	{
		//Get specialist
		$specialist = $this->specialist->findAll();

		$timeserving = QueryBuilder::table('timeserving')->groupBy('weeksday')->get();

		$this->render('admin.formSchedule', ['specialist' => $specialist, 'timeserving' => $timeserving]);
	}

	//Perform multiSelect DropBox Doctor
	public function multiSelect()
	{
		//Get list doctor of Specialist from model Doctor
		$listDoctor = $this->specialist->findById(['id' => $_POST['query']])->doctors();

		$output = "";
		foreach ($listDoctor as $row) {
			$output .= "<option value='".$row->id."' >".$row->name."</option>";
		}
		echo $output;
	}

	//Insert Schedule
	public function insertSchedule()
	{
		$id_timeserving = QueryBuilder::table('timeserving')
						->select('id_timeserving')
						->where('weeksday', '=', $_POST['weeksday'])
						->where('work_time', '=', $_POST['work_time'])
						->get();

		//Save calendar of Doctor
		$this->calendar->id_doctor = $_POST['name'];
		$this->calendar->id_timeserving = $id_timeserving[0]['id_timeserving'];
		$this->calendar->save();

		$this->redirect('http://localhost/mvc/public/ScheduleController/listSchedule');
	}

	//Fetch data list schedule 
	public function fetch_data()
	{
		$schedule = QueryBuilder::table('calendar')
				  ->join('timeserving', 'calendar.id_timeserving', '=', 'timeserving.id_timeserving')
				  ->join('doctor', 'doctor.id', '=', 'calendar.id_doctor')
				  ->get();

		//Get specialist object data
		$specialist = $this->specialist->findAll();

		$this->render('admin.dataAjax.TableSchedule', ['schedule' => $schedule, 'specialist' => $specialist]);
	}

	//Edit timeserving
	public function editTimeserving()
	{
		$id_timeserving = QueryBuilder::table('timeserving')
						->select('id_timeserving')
						->where('weeksday', '=', $_POST['weeksday'])
						->where('work_time', '=', $_POST['work_time'])
						->get();

		//Get calendar follow id of doctor and id of timeserve
		$calendar = $this->calendar->findById(['id_doctor' => $_POST['hidden_idDoctor'],
									'id_timeserving' => $_POST['hidden_idTimeserving'] ]);

		//Edit calendar
		$calendar->id_timeserving = $id_timeserving[0]['id_timeserving'];
		$calendar->update();

		$success = "<div class='alert alert-success'>Edit successed</div>";

		$data = array(
			'success' => $success
		);

		echo json_encode($data);
	}

	//Delete Schedule
	public function deleteSchedule()
	{

		$calendar = $this->calendar->findById(['id_doctor' => $_POST['id_doctor'],
									'id_timeserving' => $_POST['id_timeserving'] ]);
		$calendar->delete();

		$success = "<div class='alert alert-success'>Delete successed</div>";

		$data = array(
			'success' => $success
		);

		echo json_encode($data);
	}

	//Function select timework od Doctor
	public function selectTimework()
	{
		$output = "";

		//Get time work of day from database
		$times = QueryBuilder::table('timeserving')
				->where('weeksday', '=', $_POST['query'])
				->groupBy('work_time')
				->get();
		
		$output .= "<option>Chọn giờ làm việc</option>";
		foreach($times as $row)
		{
			if($row['work_time'] == $_POST['time'] && $row['weeksday'] == $_POST['weeksday']){
				continue;
			}
			$output .= "<option value='".$row['work_time']."'>".$row['work_time']."</option>";
		}
		echo $output;
	}

	//Filter timework of doctor 
	public function filterFormSchedule()
	{
		$times = QueryBuilder::table('timeserving')
				->where('weeksday', '=', $_POST['query'])
				->groupBy('work_time')
				->get();


		$scheduleOfDoctor = QueryBuilder::table('calendar')
						  ->select('timeserving.work_time')
						  ->join('timeserving', 'calendar.id_timeserving', '=', 'timeserving.id_timeserving')
						  ->where('id_doctor', '=', $_POST['id_doctor'])
						  ->where('weeksday', '=', $_POST['query'])
						  ->get();
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