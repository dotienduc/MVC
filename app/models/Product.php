<?php 

use App\core\AppException;
use App\core\Registry;

class Product
{
	private $conn;

	public function __construct()
	{
		$this->conn = Registry::getInstance()->database;
	}

	public function getSaleProducts()
	{
		$sql = "select * from products where promotion_price != '0'
				 order by id desc limit 5";

		$rs = mysqli_query($this->conn, $sql);

		$result = array();

		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}
		return $result;
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

		if(!$rs)
		{
			throw new AppException("Invalid ID");
		}

		$result = mysqli_fetch_array($rs);
		return $result;
	}

	public function actionPay($fName, $lName, $phone, $gender, $address, $email, $note, $total)
	{
		$sql1 = "insert into 
				customers(fname, lname, address, email, gender, phone, note)
				values('".$fName."', '".$lName."', '".$address."',
				 '".$email."', '".$gender."', '".$phone."', '".$note."')
				";

		mysqli_query($this->conn, $sql1);

		$id_customer = mysqli_insert_id($this->conn);

		$sql2 = " insert into 
				bills(id_customer, date_order, total, note, status)
				values('".$id_customer."', '".date('Y-m-d')."', '".$total."', '".$note."', '0')
				";

		mysqli_query($this->conn, $sql2);

		$id_bill = mysqli_insert_id($this->conn);

		$bill_details = "";
		foreach ($_SESSION['shopping_cart'] as $keys => $values) {
			$bill_details .= "
			insert into bill_detail(id_bill, id_product, quantity, price)
			values('".$id_bill."', '".$values["product_id"]."', '".$values["product_quantity"]."',
			 '".$values["product_price"]."');
			 ";
		}
		if(mysqli_multi_query($this->conn, $bill_details))
		{
			unset($_SESSION['shopping_cart']);
		}
		return $id_bill;
	}

	public function getListOrder()
	{
		$sql = "select c.fname, c.lname, c.address, c.email, c.phone, b.id, b.total, b.status, sum(bd.quantity)as quantity from bills b inner join customers c on b.id_customer = c.id inner join bill_detail bd on b.id = bd.id_bill group by b.id";

		$rs = mysqli_query($this->conn, $sql);


		$result = array();

		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}
		return $result;
	}

	public function getDetailOrder($id_bill)
	{
		$sql = "select c.*, b.id as id_bill, b.total, p.name as product_name,
			 bd.quantity, bd.price
			 from bills b
			 inner join customers c on b.id_customer = c.id
			 inner join bill_detail bd on b.id = bd.id_bill
			 inner join products p on p.id = bd.id_product
			 where b.id='".$id_bill."' ";
		$rs = mysqli_query($this->conn, $sql);

		$result = array();
		while($row = mysqli_fetch_array($rs))
		{
			$result[] = $row;
		}

		return $result;
	}

	public function updateStatus($id_bill, $status)
	{
		$sql = "update bills set status = '".$status."' where id = ".$id_bill;
		mysqli_query($this->conn, $sql);
	}
}

?>