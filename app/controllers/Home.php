<?php

use App\core\Controller;
use App\SendEmail;
use App\LibraryDatabase\QueryBuilder;

use App\model\ExaminationSchedule;
use App\model\Specialist;
use App\model\Banner;
use App\model\Doctor;
use App\model\Question;

class Home extends Controller
{
	private $sendEmail;
	private $appointent;
	private $specialist;
	private $banner;
	private $doctor;
	private $question;

	public function __construct()
	{
		$this->sendEmail 	= new SendEmail;
		$this->appointent 	= new ExaminationSchedule;
		$this->specialist 	= new Specialist;
		$this->banner 		= new Banner;
		$this->doctor  		= new Doctor;
		$this->question 	= new Question;
	}


	//Display trangtru
	public function index()
	{
		//Get all object specialist
		$specialist = $this->specialist->findAll();

		//Get all object banner;
		$banners = $this->banner->findAll();

		$this->render('home.trangtru', [
			'specialist' => $specialist,
			'banners' => $banners
		]);
	}

	//Display form lienHe
	public function lienHe()
	{
		$this->render('home.lienHe');
	}

	//Add question 
	public function addQuestion()
	{
		//Insert new object question to database
		$this->question->name  		= $_POST['name'];
		$this->question->email 		= $_POST['email'];
		$this->question->subject 	= $_POST['subject'];
		$this->question->message 	= $_POST['message'];
		$this->question->status 	= '0';

		$this->question->save();


		$success = "<p class='alert alert-success'>Cảm ơn bạn đã gửi câu hỏi về cho chúng tôi</p>";

		$data = array(
			'success' => $success
		);

		echo json_encode($data);
	}

	//Perform multiselect dropBox follow subject 
	public function makeAppointment()
	{
		if(isset($_POST['action']))
		{
			$output = '';
			if($_POST['action'] == 'subject')
			{
				//Get specialist follow Id
				$specialist = $this->specialist->findById(['id' => $_POST['query']]);

				//Get list doctor follow specialist have choosed
				$listDoctor = $specialist->doctors();

				$output .= '<option value="">Chọn bác sĩ</option>';
				foreach($listDoctor as $row)
				{
					$output .= '<option value="'.$row->id.'">'. $row->name .'</option>';
				}
			}
			if($_POST['action'] == 'doctor')
			{
				//Get calendar 
				$calendarOfDoctor = QueryBuilder::table('calendar')
								  ->join('timeserving', 'timeserving.id_timeserving', '=', 'calendar.id_timeserving')
								  ->where('id_doctor', '=', $_POST['query'])
								  ->get();


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

	//Add appointent
	public function addAppoinment()
	{
		$confirmCode = rand();

		//Add new object appointment to database
		$this->appointent->first_name 		= $_POST['fname'];
		$this->appointent->last_name 		= $_POST['lname'];
		$this->appointent->email 			= $_POST['email'];
		$this->appointent->phone 			= $_POST['phone'];
		$this->appointent->message 			= $_POST['message'];
		$this->appointent->id_doctor 		= $_POST['doctor'];
		$this->appointent->id_timeserving   = $_POST['calendar'];
		$this->appointent->id_subject 		= $_POST['subject'];
		$this->appointent->status 			= 0;
		$this->appointent->confirmed 		= 0;
		$this->appointent->confirm_code 	= $confirmCode;
		
		//Get last id of object when insert database
		$last_id = $this->appointent->save();

		$messageEmail = "
		<h3>Confirm Your Email</h3>
		<p>Click the link below to verify your account</p><br>
		<button type='button' style='padding: 5px 10px; color:black; text-decoration: none;'><a href='http://localhost/mvc/public/AppointentController/cofirmEmail/$last_id/$confirmCode'>Xác nhận lịch khám tại đây</a></button>
		";

		//Send email 
		$this->sendEmail->send($messageEmail, $_POST['email']);
	}
}