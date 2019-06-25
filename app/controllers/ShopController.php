<?php
use Jenssegers\Blade\Blade;
use App\core\Controller;
use App\SendEmail;

class ShopController extends Controller
{
	private $product;
	private $sendEmail;

	public function __construct()
	{
		$this->product = $this->model('Product');
		$this->sendEmail = new SendEmail;
	}

	//Function display list product
	public function shop()
	{
		//Get list product from model Product
		$products = $this->product->getProducts();

		$blade = new Blade('../app/views/home', '../app/cache');
		echo $blade->make('shop', ['products' => $products]);
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

		$blade = new Blade('../app/views/home', '../app/cache');
		echo $blade->make('shoppingCart', ['items' => $items, 'total' => $total]);
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

		$blade = new Blade('../app/views/home', '../app/cache');
		echo $blade->make('checkout', ['items' => $items, 'total' => $total, 'shipping' => $shipping]);
	}

	//Function display info detail product
	public function productDetail($id)
	{
		//Get info product from Model Product
		$product = $this->product->getDetailProduct($id);

		$blade = new Blade('../app/views/home', '../app/cache');
		echo $blade->make('productDetail', ['id' => $id, 'product' => $product]);
	}

	//Function Auto load data cart
	public function getItemInCart()
	{
		$order_table = "";
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

		//Action pay order from model Product
		$rs = $this->product->actionPay($first_name, $last_name, $phone_number, $gender, $address, $email_address, $note, $hidden_total);

		//
		$detailOrder = $this->product->getDetailOrder($rs);

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
		//Get list order from model Product
		$listOrder = $this->product->getListOrder();

		$blade = new Blade('../app/views/admin', '../app/cache');
		echo $blade->make('ListOfInvoices', ['listOrder' => $listOrder]);
	}

	//Function display detail Order
	public function detailOrder()
	{
		$id = $_POST['id_bill'];
		$detailOrder = $this->product->getDetailOrder($id);

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

		$this->product->updateStatus($id_bill, $status);
	}
}