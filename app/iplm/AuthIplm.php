<?php 

namespace App\iplm;

interface AuthIplm
{
	public function checkAuth($username, $password);
	public function addUser($username, $email, $password, $phone = "",
		$address = "", $role = 0, $status = 0);
	public function editUser($id_account, $username, $email, $phone = "",
		$address = "", $role = 0, $status = 0);
	public function deleteUser($id_account);
}
