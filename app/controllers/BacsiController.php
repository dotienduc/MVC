<?php


use Jenssegers\Blade\Blade;
use App\core\Controller;
use App\model\Doctor;
use App\model\Specialist;
use App\LibraryDatabase\QueryBuilder;

class BacsiController extends Controller
{
	//function display table doctor
	public function listDoctor()
	{
		//Query builder get list doctor
		$doctors = QueryBuilder::table('doctor')
		->select('doctor.id', 'name', 'image', 'address', 'phone', 'email', 'description', 'name_specialist')
		->join('specialist', 'doctor.id_specialist', '=', 'specialist.id')
		->get();

		//Render view
		$this->render('home.danhSachBacSi', ['doctors' => $doctors]);
	}

	//Display info Doctor
	public function viewProfileDoctor($id)
	{
		$d 			= new Doctor;
		//Get doctor by id
		$doctor 	= $d->findById(['id' => $id]);
		//Get specialist of doctor 
		$specialist = $doctor->specialist();

		//Query calendars of Doctor 
		$calendars  = QueryBuilder::table('calendar')
					->select('weeksday', 'work_time')
					->join('timeserving', 'timeserving.id_timeserving', '=', 'calendar.id_timeserving')
					->where('id_doctor', '=', $id)->get();

		//Render view
		$this->render('home.thongTinBacSi', ['doctor' => $doctor, 'id' => $id
					, 'calendars' => $calendars, 'specialist' => $specialist]);
	}


	//------------Admin-------------

	//Function fetch data list doctor
	public function fetch_data()
	{
		//Get list doctor by query builder
		$doctors = QueryBuilder::table('doctor')
		->select('doctor.id', 'name', 'image', 'address', 'phone', 'email', 'description', 'name_specialist')
		->join('specialist', 'doctor.id_specialist', '=', 'specialist.id')
		->get();

		$this->render('admin.dataAjax.TableDoctor', ['doctors' => $doctors]);
	}

	//Function display table Doctor
	public function managementDoctor()
	{
		//Get all specialist object
		$sl = new Specialist;
		$specialist = $sl->findAll();

		$this->render('admin.doctorList', ['specialist' => $specialist]);
	}

	//Function display form Doctor
	public function formDoctor()
	{
		//Middleware request role
		if(isset($_SESSION['info']))
		{
			$this->middleware($_SESSION['info'][0]->role);
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

			//Insert new object
			$doctor = new Doctor;
			$doctor->name  			= $name;
			$doctor->image 			= $image;
			$doctor->id_specialist	= $id_specialist;
			$doctor->address 		= $address;
			$doctor->phone 			= $phone;
			$doctor->email 			= $email;
			$doctor->description 	= $description;
			$doctor->save();
			
			//Redirect to list Doctor page
			$this->redirect('http://localhost/mvc/public/BacsiController/managementDoctor');
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

			//Edit object
			$d = new Doctor;
			$doctor = $d->findById(['id' => $id]);
			$doctor->name  			= $name;
			$doctor->image 			= $image;
			$doctor->id_specialist	= $id_specialist;
			$doctor->address 		= $address;
			$doctor->phone 			= $phone;
			$doctor->email 			= $email;
			$doctor->description 	= $description;
			$doctor->update();

			$message = "<div class='alert alert-success'>Insert successed</div>";
			$data = array(
				'success' => $message
			);
			echo json_encode($data);
		}else if(isset($_POST['action']) && $_POST['action'] == 'delete'){

			//Delete doctor object
			$d = new Doctor;
			$doctor = $d->findById(['id' => $_POST['id_doctor']]);
			$doctor->delete();

			$message = "<div class='alert alert-success'>Delete successed</div>";
			$data = array(
				'success' => $message
			);
			echo json_encode($data);
		}else
		{
			//Get all speacilist 
			$s = new Specialist;
			$specialist = $s->findAll();

			$this->render('admin.formDoctor', ['specialist' => $specialist]);
		}
	}


	//Get detail info doctor
	public function getDetailDoctor()
	{
		//Get detail doctor object by id
		$d = new Doctor;
		$doctor = $d->findById(['id' => $_POST['doctor_id']]);

		echo json_encode($doctor);
	}

}