<?php
use Jenssegers\Blade\Blade;
use App\core\Controller;

class ShopController extends Controller
{
	private $product;

	public function __construct()
	{
		$this->product = $this->model('Product');
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

		$items = $_SESSION['shopping_cart'];

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
		$blade = new Blade('../app/views/home', '../app/cache');
		echo $blade->make('checkout');
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
}