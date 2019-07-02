@extends('master')
@section('content')
<section class="inner-bg over-layer-black" style="background-image: url('../img/bg/4.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="mini-title inner-style-2">
					<h3>Shop </h3>
					<p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Shop </a></p>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- SHOPING CART AREA START -->
<section class="shoping-cart-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-list">
					<table>
						<thead>
							<tr>
								<th>Remove</th>
								<th>Image</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody id="order_table">
							@foreach($items as $item)
							<tr>
								<td>
									<a href="#" class="delete" id="{{ $item['product_id'] }}"><i class="fa fa-trash-o"></i></a>
								</td>
								<td class="product-image">
									<a href="#"><img alt="#" src="../img/shop/{{ $item['product_image'] }}"></a>
								</td>
								<td>
									<h4><a href="../ShopController/productDetail/{{ $item['product_id'] }}">{{ $item['product_name'] }}</a></h4>
								</td>
								<td>
									<p>$ {{ $item['product_price'] }}</p>
								</td>
								<td>
									<input class="text-center quantity" type="number" value="{{ $item['product_quantity'] }}" name="quantity[]" id="quantity{{$item['product_id']}}" data-product_id="<?php echo $item["product_id"]; ?>">
								</td>
								<td>
									<p>$ {{ $item['product_price'] * $item['product_quantity'] }}</p>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="../ShopController/shop" class="btn-theme">Tiếp tục mua sắm</a>
			</div>
		</div>  
	</div>
</section>
<!-- SHOPING CART AREA END -->
<hr>
<!-- DISCOUNT SUBTOTAL AREA STRAT -->
<section class="discount">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="subtotal-area">
					<div class="total">
						<h4>Subtotal<span>$ {{$total}}</span></h4>
					</div>
					<div class="total-content">
						<a href="../ShopController/checkout">
							<button class="btn-theme pull-right">Thanh toán</button>
						</a>
						<p class="text-left">Checkout With Multiple Addresses</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){
		$('.delete').click(function(e){
			e.preventDefault();
			var product_id = $(this).attr('id');
			var action = "remove";
			if(confirm("Bạn có chắc chắn bỏ sản phẩm này ?"))
			{
				$.ajax({
					url: "../ShopController/shoppingCart",
					method: "POST",
					data: {product_id: product_id, action: action},
					success: function(data)
					{
						location.reload();
					}
				});
			}
		});

		$('.quantity').on('blur', function(){
			var number = parseFloat(this.value);
			$(this).val(number.toFixed());
			var quantity = $(this).val();
			var product_id = $(this).data("product_id");
			var action = "quantity_change";
			if(quantity != '')
			{
				if(quantity <= 0){
					quantity = 1;
				}
				$.ajax({
					url: "../ShopController/shoppingCart",
					method: "POST",
					data: {product_id: product_id, quantity: quantity, action: action},
					success: function(data)
					{
						location.reload();
					}
				});
			}
		});
	});
</script>
@endsection