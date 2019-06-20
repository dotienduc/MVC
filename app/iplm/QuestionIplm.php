<?php

namespace App\iplm;

interface QuestionIplm
{
	public function insertQuestion($name, $email, $subject, $message, $status = 0);
}