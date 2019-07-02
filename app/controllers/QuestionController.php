<?php 

use App\core\Controller;
use App\SendEmail;

class QuestionController extends Controller
{
	private $question;
	private $sendEmail;

	public function __construct()
	{
		$this->question = $this->model('Question');
		$this->sendEmail = new SendEmail;
	}

	public function listQuestion()
	{
		$this->render('admin.ListQuestion');
	}

	public function formQuestion($id)
	{
		$question = $this->question->getDetail($id);

		$this->render('admin.FormQuestion', ['id' => $id, 'question' => $question]);
	}

	public function fetch_data()
	{
		$questions = $this->question->getData();

		$this->render('admin.dataAjax.TableQuestion', ['questions' => $questions]);
	}

	public function answerQuestion()
	{
		$id_question = $_POST['id_questionHidden'];
		$email = $_POST['id_emailHidden'];
		$message = $_POST['message'];

		$this->question->updateStatusQuestion($id_question);

		$this->sendEmail->send($message, $email);
	}

}
?>