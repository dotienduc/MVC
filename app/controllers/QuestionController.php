<?php 

use App\core\Controller;
use App\SendEmail;

use App\model\Question;

class QuestionController extends Controller
{
	private $question;
	private $sendEmail;

	public function __construct()
	{
		$this->question = new Question;
		$this->sendEmail = new SendEmail;
	}

	//Display screen list question
	public function listQuestion()
	{
		$this->render('admin.ListQuestion');
	}

	//Display screen form question
	public function formQuestion($id)
	{
		//Get detail question follow id 
		$question = $this->question->findById(['id' => $id]);

		$this->render('admin.FormQuestion', ['id' => $id, 'question' => $question]);
	}

	//Display all data question by ajax
	public function fetch_data()
	{
		//Get all object question
		$questions = $this->question->findAll(['status' => 0]);

		$this->render('admin.dataAjax.TableQuestion', ['questions' => $questions]);
	}

	//Answer question
	public function answerQuestion()
	{
		//Get question follow id
		$question = $this->question->findById(['id' => $_POST['id_questionHidden']]);

		//Edit status of question when answer
		$question->status = '1';
		$question->update();

		//Send email 
		$this->sendEmail->send($_POST['message'], $_POST['id_emailHidden'], "Phản hồi của bác sĩ");
	}

}
?>