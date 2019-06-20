<?php
use Jenssegers\Blade\Blade;
use App\core\Controller;

class Home extends Controller
{
	private $user;
	private $contact;
	private $doctor;

	public function __construct()
	{
		$this->user = $this->model('User');
		$this->contact = $this->model('Question');
		$this->doctor = $this->model('Doctor');
	}


	//Function display trangtru
	public function index()
	{

		//Get list specialist from Model Doctor
		$specialist = $this->doctor->getListSpeacialist();

		$blade = new Blade('../app/views/home', '../app/cache');

		echo $blade->make('trangtru', [
					'specialist' => $specialist
					]);
	}

	//Function display form lienHe
	public function lienHe()
	{
		$blade = new Blade('../app/views/home', '../app/cache');
		echo $blade->make('lienHe');
	}

	//Function add question 
	public function addQuestion()
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];


		//Add question to database
		$this->contact->insertQuestion($name, $email, $subject, $message);

		$success = "<p class='alert alert-success'>Cảm ơn bạn đã gửi câu hỏi về cho chúng tôi</p>";

		$data = array(
			'success' => $success
		);

		echo json_encode($data);
	}

	//Function perform multiselect dropBox
	public function makeAppointment()
	{
		if(isset($_POST['action']))
		{
			$output = '';
			if($_POST['action'] == 'subject')
			{
				//Get list doctor of specialist from model Doctor
				$listDoctor = $this->doctor->getListDoctorOfSpecialist($_POST['query']);
				$output .= '<option value="">Chọn bác sĩ</option>';
				foreach($listDoctor as $row)
				{
					$output .= '<option value="'.$row["id_doctor"].'">'. $row['name'] .'</option>';
				}
			}
			if($_POST['action'] == 'doctor')
			{
				//Get calendar of doctor from model Doctor
				$calendarOfDoctor = $this->doctor->getCalendar($_POST['query']);
				$output .= '<option value="">Chọn lịch khám</option>';
				foreach($calendarOfDoctor as $row)
				{
					$output .= '<option value="'.$row["id_timeserving"].'">';
					$output .= '<div class="item">
									<div class="label">'. $row["weeksday"] .'</div>
									<div class="value">'. $row["work_time"] .'</div>
								</div>';
					$output .= '</option>';
				}
			}
			echo $output;
		}
	}

	//Function add appointent
	public function addAppoinment()
	{
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$id_subject = $_POST['subject'];
		$id_doctor = $_POST['doctor'];
		$id_calendar = $_POST['calendar'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];

		//Add appointent to database
		$this->doctor->insertAppoinment($firstName, $lastName, $email,
					 $phone, $message, $id_doctor, $id_calendar, $id_subject);
	}
}