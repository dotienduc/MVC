<?php
use Jenssegers\Blade\Blade;
use App\core\Controller;

class BacsiController extends Controller
{
	private $doctor;

	public function __construct()
	{
		$this->doctor = $this->model('Doctor');

	}

	//function display table doctor
	public function listDoctor()
	{
		//Get list doctor from model Doctor
		$doctors = $this->doctor->getListDoctor();

		$this->render('home.danhSachBacSi', ['doctors' => $doctors]);
	}

	//Function display info Doctor
	public function viewProfileDoctor($id)
	{
		//Get info detail doctor from model Doctor
		$profile = $this->doctor->getDoctor($id);

		//get calendar doctor
		$calendars = $this->doctor->getCalendar($id);

		$this->render('home.thongTinBacSi', ['doctor' => $profile, 'id' => $id
			, 'calendars' => $calendars
		]);
	}


	//------------Admin-------------

	//Function fetch data list doctor
	public function fetch_data()
	{
		//Get list doctor from model Doctor
		$doctors = $this->doctor->getListDoctor();

		$this->render('admin.dataAjax.TableDoctor', ['doctors' => $doctors]);
	}

	//Function display table Doctor
	public function managementDoctor()
	{
		//Get specialist from model Doctor
		$specialist = $this->doctor->getListSpeacialist();

		$this->render('admin.doctorList', ['specialist' => $specialist]);
	}

	//Function display form Doctor
	public function formDoctor()
	{
		if(isset($_SESSION['info']))
		{
			$this->middleware($_SESSION['info']['role']);
		}
		if(isset($_POST['btn-Save']))
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$id_specialist = $_POST['specialist'];
			$phone = $_POST['phone'];
			$file = $_FILES['image'];
			move_uploaded_file($file['tmp_name'], "../public/img/team/".$file['name']);
			$image = $file['name'];
			$description = $_POST['description'];

			//Insert doctor to database
			$this->doctor->insertDoctor($name, $email, $address, $id_specialist, $phone, $image, $description);
			header('location: http://localhost/mvc/public/BacsiController/managementDoctor');
		}else if(isset($_POST['hidden_id']))
		{
			$id = $_POST['hidden_id'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$id_specialist = $_POST['specialist'];
			$phone = $_POST['phone'];
			if(isset($_FILES['image']))
			{
				$file = $_FILES['image'];
				move_uploaded_file($file['tmp_name'], "../public/img/team/".$file['name']);
				$image = $file['name'];
			}
			$image = $_POST['old_picture'];
			$description = $_POST['description'];

			//Edit doctor to database
			$this->doctor->editDoctor($name, $image, $id_specialist, $address, $phone, $email, $description, $id);
			$message = "<div class='alert alert-success'>Insert successed</div>";
			$data = array(
				'success' => $message
			);
			echo json_encode($data);
		}else if(isset($_POST['action']) && $_POST['action'] == 'delete'){

			//Delete doctor to database
			$this->doctor->deleteDoctor($_POST['id_doctor']);
			$message = "<div class='alert alert-success'>Delete successed</div>";
			$data = array(
				'success' => $message
			);
			echo json_encode($data);
		}else
		{
			//Get specialist from model Doctor
			$specialist = $this->doctor->getListSpeacialist();

			$this->render('admin.formDoctor', ['specialist' => $specialist]);
		}
	}


	//Function get detail info doctor
	public function getDetailDoctor()
	{
		$doctor = $this->doctor->getDoctor($_POST['doctor_id']);

		echo json_encode($doctor);
	}

}