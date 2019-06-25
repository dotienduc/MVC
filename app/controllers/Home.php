<?php

use Jenssegers\Blade\Blade;
use App\core\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

		//Get list banner from model Doctor
		$banners = $this->doctor->getBanner();

		$blade = new Blade('../app/views/home', '../app/cache');

		echo $blade->make('trangtru', [
			'specialist' => $specialist,
			'banners' => $banners
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

		$confirmCode = rand();

		//Add appointent to database
		$last_id = $this->doctor->insertAppoinment($firstName, $lastName, $email,
			$phone, $message, $id_doctor, $id_calendar, $id_subject, $confirmCode);

		$messageEmail = "
		Confirm Your Email
		Click the link below to verify your account
		http://localhost/mvc/public/AppointentController/cofirmEmail/$last_id/$confirmCode
		";

		$mail = new PHPMailer(true);

		try {
		    $mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = "dotienduc1998@gmail.com";
			$mail->Password = "Dotienduc1998";
			$mail->SetFrom("dotienduc1998@gmail.com");
			$mail->Subject = "Confirm Email";
			$mail->Body = $messageEmail;
			$mail->AddAddress($email);

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}