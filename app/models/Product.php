<?php 

require_once __DIR__ . '../../../vendor/fzaninotto/faker/src/autoload.php';
require_once __DIR__ . '../../../vendor/autoload.php';

use App\connect\Connection;
use App\iplm\ProductIplm;

class Product implements ProductIplm
{
	private $conn;

	public function __construct()
	{
		$this->conn = Connection::connectDb();
	}

	public function getProducts()
	{
		$sql = "select * from products where status = '1' order by id desc";

		$rs = mysqli_query($this->conn, $sql);

		$result = array();

		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}
		return $result;
	}

	public function getDetailProduct($id_product)
	{
		$sql = "select * from products where id = ".$id_product;

		$rs = mysqli_query($this->conn, $sql);

		$result = mysqli_fetch_array($rs);
		return $result;
	}
}

?>