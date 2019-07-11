<?php

use App\core\Controller;
use App\SendEmail;
use App\LibraryDatabase\QueryBuilder;

use App\model\Products;
use App\model\Customer;
use App\model\Bill;
use App\model\BillDetail;

class ShopController extends Controller
{
	private $product;
	private $sendEmail;
	private $customer;
	private $bill;
	private $billDetail;

	public function __construct()
	{
		$this->product = new Products;
		$this->sendEmail = new SendEmail;
		$this->customer  = new Customer;
		$this->bill 	 = new Bill;
		$this->billDetail= new BillDetail;
	}

	//Function display list product
	public function shop()
	{
		$products = $this->product->findAll();

		$saleProducts = QueryBuilder::table('products')
					  ->where('promotion_price', '!=', '0')
					  ->orderBy('id', 'desc')
					  ->limit(5)
					  ->get();

		$this->render('home.shop', ['products' => $products,
						 			'saleProducts' => $saleProducts]);

	}

	//Function display shopping cart
	public function shoppingCart()
	{
		if(isset($_POST['product_id']))
		{
			if($_POST['action'] == 'remove')
			{
				foreach ($_SESSION['shopping_cart'] as $keys => $values) {
					if($_SESSION['shopping_cart'][$keys]['product_id'] == $_POST['product_id'])
					{
						unset($_SESSION['shopping_cart'][$keys]);
					}
				}
			}
			if($_POST['action'] == 'quantity_change')
			{
				foreach ($_SESSION['shopping_cart'] as $keys => $values) {
					if($_SESSION['shopping_cart'][$keys]['product_id'] == $_POST['product_id'])
					{
						$_SESSION['shopping_cart'][$keys]['product_quantity'] = $_POST['quantity'];
					}
				}
			}
		}

		$items = [];
		if(isset($_SESSION['shopping_cart'])){
			$items = $_SESSION['shopping_cart'];
		}

		$total = 0;

		foreach ($items as $value) {
			$total = $total + ($value['product_quantity'] * $value['product_price']);
		}

		$this->render('home.shoppingCart', ['items' => $items, 'total' => $total]);
	}

	//Function display form checkout
	public function checkout()
	{
		$items = [];
		if(isset($_SESSION['shopping_cart'])){
			$items = $_SESSION['shopping_cart'];
		}

		$total = 0;

		$shipping = 5;

		foreach ($items as $value) {
			$total = $total + ($value['product_quantity'] * $value['product_price']);
		}

		$this->render('home.checkout', ['items' => $items, 'total' => $total,
										 'shipping' => $shipping]);
	}

	//Function display info detail product
	public function productDetail($id)
	{
		$product = $this->product->findById(['id' => $id]);

		$this->render('home.productDetail', ['id' => $id, 'product' => $product]);
	}

	//Function Auto load data cart
	public function getItemInCart()
	{
		$order_table = "";
		$countCart = 0;
		if(!empty($_SESSION['shopping_cart']))
		{
			$total = 0;
			$d = 0;
			foreach ($_SESSION['shopping_cart'] as $keys => $values) {
				$order_table .= '
				<tr>
				<td class="quantity">'.$values["product_quantity"].' x</td>
				<td class="product"><a href="shop-product.html">'.$values["product_name"].'</a></td>
				<td class="amount">$'.$values["product_price"] * $values["product_quantity"].'</td>
				</tr>
				';
				$d++;
				$total += ($values['product_quantity'] * $values['product_price']);
			}
			$order_table .= '
			<tr>
			<td class="total-quantity" colspan="2"><strong>Tổng '.$d.' Items</strong></td>
			<td class="total-amount"><strong>$'.$total.'</strong></td>
			</tr>
			';
			$countCart = count($_SESSION['shopping_cart']);
		}
		$output = array(
			'order_table' => $order_table,
			'cart_item' => $countCart
		);
		echo json_encode($output);
	}


	//Function Action of shopping cart
	public function action()
	{
		if(isset($_POST['product_id']))
		{
			$order_table = '';
			if($_POST['action'] == 'add')
			{
				if(isset($_SESSION['shopping_cart']))
				{
					$is_availble = 0;
					foreach($_SESSION['shopping_cart'] as $keys => $values)
					{
						if($_SESSION['shopping_cart'][$keys]['product_id'] == $_POST['product_id'])
						{
							$is_availble++;
							$_SESSION['shopping_cart'][$keys]['product_quantity'] = $_SESSION['shopping_cart'][$keys]['product_quantity'] +  $_POST['product_quantity'];
						}
					}
					if($is_availble < 1)
					{
						$item_array = array(
							'product_id' => $_POST['product_id'],
							'product_name' => $_POST['product_name'],
							'product_price' => $_POST['product_price'],
							'product_quantity' => $_POST['product_quantity'],
							'product_image' => $_POST['product_image']
						);
						$_SESSION['shopping_cart'][] = $item_array;
					}
				}else{
					$item_array = array(
						'product_id' => $_POST['product_id'],
						'product_name' => $_POST['product_name'],
						'product_price' => $_POST['product_price'],
						'product_quantity' => $_POST['product_quantity'],
						'product_image' => $_POST['product_image']
					);
					$_SESSION['shopping_cart'][] = $item_array;
				}
			}
			if(!empty($_SESSION['shopping_cart']))
			{
				$total = 0;
				$d = 0;
				foreach ($_SESSION['shopping_cart'] as $keys => $values) {
					$order_table .= '
					<tr>
					<td class="quantity">'.$values["product_quantity"].' x</td>
					<td class="product"><a href="shop-product.html">'.$values["product_name"].'</a></td>
					<td class="amount">$'.$values["product_price"] * $values["product_quantity"].'</td>
					</tr>
					';
					$d++;
					$total += ($values['product_quantity'] * $values['product_price']);
				}
				$order_table .= '
				<tr>
				<td class="total-quantity" colspan="2"><strong>Tổng '.$d.' Items</strong></td>
				<td class="total-amount"><strong>$'.$total.'</strong></td>
				</tr>
				';
			}
			$output = array(
				'order_table' => $order_table,
				'cart_item' => count($_SESSION['shopping_cart'])
			);
			echo json_encode($output);
		}
	}

	//Function pay bill
	public function payBill()
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$phone_number = $_POST['phone_number'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$email_address = $_POST['email_address'];
		$note = $_POST['note'];
		$hidden_total = $_POST['hidden_total'];

		$this->customer->fname 		= $first_name;
		$this->customer->lname 		= $last_name;
		$this->customer->address 	= $address;
		$this->customer->email 		= $email_address;
		$this->customer->gender 	= $gender;
		$this->customer->phone 		= $phone_number;
		$this->customer->note 		= $note;
		$idCustomerLastId = $this->customer->save();

		$this->bill->id_customer 	= $idCustomerLastId;
		$this->bill->date_order 	= date('Y-m-d');
		$this->bill->total 			= $hidden_total;
		$this->bill->note 			= $note;
		$this->bill->status 		= 0;

		$idBillLastId = $this->bill->save();

		foreach ($_SESSION['shopping_cart'] as $keys => $values) {
			$this->billDetail->id_bill 		= $idBillLastId;
			$this->billDetail->id_product 	= $values["product_id"];
			$this->billDetail->quantity 	= $values["product_quantity"];
			$this->billDetail->price 		= $values["product_price"];
			$this->billDetail->save();
		}

		unset($_SESSION['shopping_cart']);

		$detailOrder = QueryBuilder::table('bills b')
					 ->select('c.*', 'b.id as id_bill', 'b.total',
					  'p.name as product_name', 'bd.quantity', 'bd.price')
					 ->join('customers c', 'b.id_customer', '=', 'c.id')
					 ->join('bill_detail bd', 'b.id', '=', 'bd.id_bill')
					 ->join('products p', 'p.id', '=', 'bd.id_product')
					 ->where('b.id', '=', $idBillLastId)
					 ->get();

		$order = '';
		$customerDetail = '';
		$order_detail = '';
		$total = 0;

		foreach($detailOrder as $row)
		{
			$customerDetail = '  
			<label>Tên khách hàng : '.$row["fname"].''.$row["lname"].'</label>  
			<p>Địa chỉ : '.$row["address"].'</p>  
			<p>Số điện thoại : '.$row["phone"].'</p>  
			<p>Email : '.$row["email"].'</p> 
			<p>Ghi chú : '.$row["note"].'</p>   
			';

			$order_detail .= "  
			<tr>  
			<td>".$row["product_name"]."</td>  
			<td>".$row["quantity"]."</td>  
			<td>".$row["price"]."</td>  
			<td>".number_format($row["quantity"] * $row["price"], 2)."</td>  
			</tr>  
			";  
			$total = $total + ($row["quantity"] * $row["price"]);
		}
		$order = '
		<div class="table-responsive">  
			<table class="table">  
				<tr>  
					<td><label>Thông tin khách hàng</label></td>  
				</tr>  
				<tr>  
					<td>'.$customerDetail.'</td>  
				</tr>  
				<tr>  
					<td><label>Thông tin hóa đơn</label></td>  
				</tr>  
				<tr>  
					<td>  
						<table class="table table-bordered">  
						<tr>  
							<th width="50%">Tên sản phẩm</th>  
							<th width="15%">Số lượng</th>  
							<th width="15%">Giá</th>  
							<th width="20%">Tổng</th>  
						</tr>  
						'.$order_detail.'  
						<tr>  
							<td colspan="3" align="right"><label>Tổng hóa đơn</label></td>  
							<td>'.number_format($total, 2).'</td>  
						</tr>  
						</table>  
					</td>  
				</tr>  
			</table>  
		</div>
		';
		$this->sendEmail->send($order, $email_address);
	}

	//Function display list order 
	public function listOrder()
	{
		$listOrder = QueryBuilder::table('bills b')
				   ->select('c.fname', 'c.lname', 'c.address', 'c.email', 'c.phone', 'b.id',
					'b.total', 'b.status', 'sum(bd.quantity) as quantity')
				   ->join('customers c', 'b.id_customer', '=', 'c.id')
				   ->join('bill_detail bd', 'b.id', '=', 'bd.id_bill')
				   ->groupBy('b.id')
				   ->get();
		
		$this->render('admin.ListOfInvoices', ['listOrder' => $listOrder]);
	}

	//Function display detail Order
	public function detailOrder()
	{
		$id = $_POST['id_bill'];

		$detailOrder = QueryBuilder::table('bills b')
				   ->select('c.*', 'b.id as id_bill', 'b.total', 'p.name as product_name',
				    'bd.quantity', 'bd.price')
				   ->join('customers c', 'b.id_customer', '=', 'c.id')
				   ->join('bill_detail bd', 'b.id', '=', 'bd.id_bill')
				   ->join('products p', ' p.id', '=', 'bd.id_product')
				   ->where('b.id', '=', $id)
				   ->get();

		$order = '';
		$customerDetail = '';
		$order_detail = '';
		$total = 0;

		foreach($detailOrder as $row)
		{
			$customerDetail = '  
			<label>Tên khách hàng : '.$row["fname"].''.$row["lname"].'</label>  
			<p>Địa chỉ : '.$row["address"].'</p>  
			<p>Số điện thoại : '.$row["phone"].'</p>  
			<p>Email : '.$row["email"].'</p> 
			<p>Ghi chú : '.$row["note"].'</p>   
			';

			$order_detail .= "  
			<tr>  
			<td>".$row["product_name"]."</td>  
			<td>".$row["quantity"]."</td>  
			<td>".$row["price"]."</td>  
			<td>".number_format($row["quantity"] * $row["price"], 2)."</td>  
			</tr>  
			";  
			$total = $total + ($row["quantity"] * $row["price"]);
		}
		$order = '
		<div class="table-responsive">  
			<table class="table">  
				<tr>  
					<td><label>Thông tin khách hàng</label></td>  
				</tr>  
				<tr>  
					<td>'.$customerDetail.'</td>  
				</tr>  
				<tr>  
					<td><label>Thông tin hóa đơn</label></td>  
				</tr>  
				<tr>  
					<td>  
						<table class="table table-bordered">  
						<tr>  
							<th width="50%">Tên sản phẩm</th>  
							<th width="15%">Số lượng</th>  
							<th width="15%">Giá</th>  
							<th width="20%">Tổng</th>  
						</tr>  
						'.$order_detail.'  
						<tr>  
							<td colspan="3" align="right"><label>Tổng hóa đơn</label></td>  
							<td>'.number_format($total, 2).'</td>  
						</tr>  
						</table>  
					</td>  
				</tr>  
			</table>  
		</div>
		';

		echo json_encode($order);
	}

	public function shipping()
	{
		$id_bill = $_POST['id_bill'];
		$status = $_POST['status'];

		$bill = $this->bill->findById(['id' => $id_bill]);
		$bill->status = $status;
		$bill->update();
	}
}