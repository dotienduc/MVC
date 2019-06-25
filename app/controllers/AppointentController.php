<?php

use Jenssegers\Blade\Blade;
use App\core\Controller;

class AppointentController extends Controller
{
	private $appointent;
	private $doctor;

	public function __construct()
	{
		$this->doctor = $this->model('Doctor');
		$this->appointent = $this->model('Appointent');
	}

	//Get list appointent from model Doctor
	public function listAppointent()
	{
		//Get list specialist from Model Doctor
		$specialist = $this->doctor->getListSpeacialist();

		//Get list doctor from Model Doctor
		$doctors = $this->doctor->getListDoctor();

		$blade = new Blade('../app/views/admin', '../app/cache');

		echo $blade->make('listOfAppointments', ['specialist' => $specialist, 'doctors' => $doctors]);
	}

	//function display formAppointent
	public function formAppointent()
	{
		//Get list specialist from Model Doctor
		$specialist = $this->doctor->getListSpeacialist();

		$blade = new Blade('../app/views/admin', '../app/cache');

		echo $blade->make('medicalExaminationForm', ['specialist' => $specialist]);
	}

	//function fetch data list appointent from model Appointent
	public function fetch_data()
	{
		//Get list appointent from model Appointent
		$appointents = $this->appointent->getListAppointent();

		$blade = new Blade('../app/views/admin/dataAjax', '../app/cache');

		echo $blade->make('TableAppointent', ['appointents' => $appointents]);
	}

	//Function insert appointent 
	public function insertAppointent()
	{
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$id_specialist = $_POST['id_specialist'];
		$phone = $_POST['phone'];
		$id_doctor = $_POST['id_doctor'];
		$email = $_POST['email'];
		$id_timeserving = $_POST['id_timeserving'];
		$description = $_POST['description'];

		//Insert appointet to database
		$this->appointent->insertData($fname, $lname, $email, $phone,
						 $description, $id_doctor, $id_timeserving, $id_specialist);

		header('location: http://localhost/mvc/public/AppointentController/listAppointent');
	}

	//Function edit appontent
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

		//Edit appointent to database
		$this->appointent->editData($fname, $lname, $email, $phone
						, $id_doctor, $id_timeserving, $id_specialist, $id_appointent, $status);

		$message = "<div class='alert alert-success'>Edit success</div>";

		$data = array(
			'success' => $message
		);

		echo json_encode($data);
	}

	//function delete appointent
	public function deleteAppointent()
	{
		$id_appointent = $_POST['id_appointent'];

		//Delete apointent to database
		$this->appointent->deleteData($id_appointent);

		$message = "<div class='alert alert-success'>Delete success</div>";

		$data = array(
			'success' => $message
		);

		echo json_encode($data);
	}

	public function cofirmEmail($id, $token)
	{
		$this->appointent->confirm($id, $token);
	}
}