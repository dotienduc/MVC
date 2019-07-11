<?php

use Jenssegers\Blade\Blade;
use App\core\Controller;
use App\LibraryDatabase\QueryBuilder;

use App\model\Specialist;
use App\model\ExaminationSchedule;

class AppointentController extends Controller
{
	private $appointent;
	private $specialist;

	public function __construct()
	{
		//Middleware router follow role account
		if(isset($_SESSION['info']))
		{
			$this->middleware($_SESSION['info'][0]->role);
		}
		$this->appointent = new ExaminationSchedule;
		$this->specialist = new Specialist;
	}

	//Get list appointent 
	public function listAppointent()
	{
		//Get all object specialist
		$specialist = $this->specialist->findAll();

		$this->render('admin.listOfAppointments', ['specialist' => $specialist]);
	}

	//Display formAppointent
	public function formAppointent()
	{
		//Get all object specialist
		$specialist = $this->specialist->findAll();

		$this->render('admin.medicalExaminationForm', ['specialist' => $specialist]);
	}

	//Fetch data list appointent 
	public function fetch_data()
	{
		$appointents = QueryBuilder::table('examination_schedule as e')
					->select('e.id', 'e.first_name', 'e.last_name', 'e.email',
					'e.phone', 'e.message', 'e.status', 'e.id_doctor', 'e.id_timeserving',
					'e.id_subject', 'd.name', 's.name_specialist', 't.weeksday', 't.work_time')
					->join('doctor as d', 'e.id_doctor', '=', 'd.id')
					->join('specialist as s', 's.id', '=', 'e.id_subject')
					->join('timeserving as t', 't.id_timeserving', '=', 'e.id_timeserving')
					->where('e.confirmed', '=', '1')
					->get();

		$this->render('admin.dataAjax.TableAppointent', ['appointents' => $appointents]);
	}

	//Insert appointent 
	public function insertAppointent()
	{

		//Insert data object's appointent to database
		$this->appointent->first_name 		= $_POST['firstname'];
		$this->appointent->last_name  		= $_POST['lastname'];
		$this->appointent->email 			= $_POST['email'];
		$this->appointent->phone 			= $_POST['phone'];
		$this->appointent->message 			= $_POST['description'];
		$this->appointent->id_doctor  		= $_POST['id_doctor'];
		$this->appointent->id_timeserving 	= $_POST['id_timeserving'];
		$this->appointent->id_subject		= $_POST['id_specialist'];
		$this->appointent->status 			= '1';
		$this->appointent->confirmed 		= '1';
		$this->appointent->confirm_code 	= '0';

		$this->appointent->save();

		//Redirect to page
		$this->redirect('http://localhost/mvc/public/AppointentController/listAppointent');
	}

	//Edit appontent
	public function editAppointent()
	{
		$id_appointent = $_POST['id_appointent'];
		$status = $_POST['status'];
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$id_specialist = $_POST['id_specialist'];
		$phone = $_POST['phone'];

		if($_POST['id_doctor'] != "")
		{
			$id_doctor = $_POST['id_doctor'];
		}else
		{
			$id_doctor = $_POST['hidden_idDoctor'];
		}
		$email = $_POST['email'];
		if($_POST['id_timeserving'] != "")
		{
			$id_timeserving = $_POST['id_timeserving'];
		}else
		{
			$id_timeserving = $_POST['hidden_idTimeserving'];
		}

		//Edit data appointent's object to database
		$ec = $this->appointent->findById(['id' => $id_appointent]);
		$ec->first_name 		= $fname;
		$ec->last_name  		= $lname;
		$ec->email 				= $email;
		$ec->phone 				= $phone;
		$ec->id_doctor  		= $id_doctor;
		$ec->id_timeserving 	= $id_timeserving;
		$ec->id_subject			= $id_specialist;
		$ec->status 			= $status;

		$ec->update();

		$message = "<div class='alert alert-success'>Edit success</div>";

		$data = array(
			'success' => $message
		);

		echo json_encode($data);
	}

	//Delete appointent
	public function deleteAppointent()
	{
		$id_appointent = $_POST['id_appointent'];

		//Get appointent by Id
		$ec = $this->appointent->findById(['id' => $id_appointent]);
		//Delete object appointent
		$ec->delete();

		$message = "<div class='alert alert-success'>Delete success</div>";

		$data = array(
			'success' => $message
		);

		echo json_encode($data);
	}

	//Confirm Email
	public function cofirmEmail($id, $token)
	{
		//Get object appointent by Id
		$appointent = $this->appointent->findById(['id' => $id]);

		if($token == $appointent->confirm_code)
		{
			//Edit data
			$appointent->confirmed 		= '1';
			$appointent->confirm_code 	= '0';
			$appointent->update();

			//Redirect to home page
			$this->redirect('http://localhost/mvc/public/home/index');
		}
	}
}