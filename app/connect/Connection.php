<?php

namespace App\connect;

class Connection
{
	const host = "localhost";
	const user = "root";
	const password = "";
	const db = "mvc";

	public static function connectDb()
	{
		$conn = mysqli_connect(self::host, self::user, self::password, self::db);
		mysqli_set_charset($conn,"utf8");
		return $conn;
	}
}