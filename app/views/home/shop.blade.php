@extends('master')
@section('css')
@endsection
@section('content')

<section class="shop-area">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="blog-sideber">
					<div class="widget clearfix">
						<div class="sideber-title">
							<h4>Sản phẩm khuyến mãi</h4>
						</div>
						@foreach($saleProducts as $product)
						<div class="shop-single-item">
							<div class="shop-sell-item">
								<img alt="#" style="height: 100px; width: 150px;" src="../img/shop/{{ $product['image'] }}">
							</div>
							<div class="shop-sell-details">
								<h5><a href="../ShopController/productDetail/{{ $product['id']}}">{{ $product['name'] }}</a></h5>
								<h5>$ {{ $product['promotion_price'] }}</h5>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="shop-right-area">
					<div class="shop-tab-area">
						<div class="tab-content">
							<div class="row tab-pane active" id="grid">
								@foreach($products as $product)
								<div class="col-md-4 col-sm-4">
									<div class="product-item">
										<div class="product-image">
											<a class="product-img" href="../ShopController/productDetail/{{ $product->id }}">
												<img class="primary-img" src="../img/shop/{{ $product->image }}" alt="" />
											</a>
										</div>
										@if($product->promotion_price == 0)
										@else
										<span class="on-sale">
											<span class="sale-text">Sale</span>
										</span>
										@endif
										<div class="product-action">
											<h4><a href="../ShopController/productDetail/{{ $product->id }}">{{ $product->name }}</a></h4>
											@if($product->promotion_price == 0)
											<span class="price">$ {{ $product->unit_price }}</span>
											@else
											<span class="text-muted"><del>$ {{ $product->unit_price }}</del></span>
											<span class="price">$ {{ $product->promotion_price }}</span>
											@endif
										</div>
										<div class="pro-action">
											<ul>
												<li>
													<a href="#">
														<i class="fa fa-retweet" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-heart" aria-hidden="true"></i>
													</a>
												</li>
												<input type="hidden" name="hidden_image" id="image{{ $product->id }}" value="{{ $product->image }}">
												<input type="hidden" name="hidden_name" id="name{{ $product->id }}" value="{{ $product->name }}">
												@if($product->promotion_price == 0)
												<input type="hidden" name="hidden_UnitPrice" id="unit_price{{ $product->id }}" value="{{ $product->unit_price }}">
												<input type="hidden" name="hidden_PromotionPrice" id="promotion_price{{ $product->id }}" value="0">
												@else
												<input type="hidden" name="hidden_PromotionPrice" id="promotion_price{{ $product->id }}" value="{{ $product->promotion_price }}">
												<input type="hidden" name="hidden_UnitPrice" id="unit_price{{ $product->id }}" value="0">
												@endif
												<input type="hidden" name="hidden_quantity" id="quantity{{ $product->id }}" value="1">
												<li class="add_cart" id="{{ $product->id }}">
													<a class="" href="#">
														<i class="fa fa-shopping-cart" aria-hidden="true"></i>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div id="list" class="tab-pane">
								<div class="row">
									<div class="col-md-12">
										<div class="shop-list-single shop-product-item-area">
											<div class="shop-list-left-content">
												<a href="#"><img src="../img/shop/s5.jpg" alt="" /></a>
												<span class="shop-cart-icon">
													<a href="#"><i class="fa fa-shopping-bag"></i></a>
												</span>
											</div>
											<div class="shop-list-right-content">
												<div class="product-content">
													<h2><a href="#">Boy’s Cloths</a></h2>
													<p><b>$ 65.00</b></p>
													<div class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
												</div>
												<div class="product-details">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.Morbi ornare lectus quis justo gravida semper.</p>
													<p>Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="shop-list-single shop-product-item-area">
											<div class="shop-list-left-content">
												<a href="#"><img src="../img/shop/s4.jpg" alt="" /></a>
												<span class="shop-cart-icon">
													<a href="#"><i class="fa fa-shopping-bag"></i></a>
												</span>
											</div>
											<div class="shop-list-right-content">
												<div class="product-content">
													<h2><a href="#">Boy’s Cloths</a></h2>
													<p><b>$ 65.00</b></p>
													<div class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
												</div>
												<div class="product-details">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.Morbi ornare lectus quis justo gravida semper.</p>
													<p>Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="shop-list-single shop-product-item-area">
											<div class="shop-list-left-content">
												<a href="#"><img src="../img/shop/s6.jpg" alt="" /></a>
												<span class="shop-cart-icon">
													<a href="#"><i class="fa fa-shopping-bag"></i></a>
												</span>
											</div>
											<div class="shop-list-right-content">
												<div class="product-content">
													<h2><a href="#">Boy’s Cloths</a></h2>
													<p><b>$ 65.00</b></p>
													<div class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
												</div>
												<div class="product-details">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.Morbi ornare lectus quis justo gravida semper.</p>
													<p>Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="shop-list-single shop-product-item-area">
											<div class="shop-list-left-content">
												<a href="#"><img src="../img/shop/s5.jpg" alt="" /></a>
												<span class="shop-cart-icon">
													<a href="#"><i class="fa fa-shopping-bag"></i></a>
												</span>
											</div>
											<div class="shop-list-right-content">
												<div class="product-content">
													<h2><a href="#">Boy’s Cloths</a></h2>
													<p><b>$ 65.00</b></p>
													<div class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
												</div>
												<div class="product-details">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.Morbi ornare lectus quis justo gravida semper.</p>
													<p>Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('javascript')
<script type="text/javascript" src="../js/fly_to_cart.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$('.add_cart').on('click', function(e){
			e.preventDefault();
			var product_id =  $(this).attr('id');
			var product_image = $('#image'+product_id).val();
			var product_name = $('#name'+product_id).val();
			var product_quantity = $('#quantity'+product_id).val();
			var promotion_price = $('#promotion_price'+product_id).val();
			var product_price = 0;
			if(promotion_price == 0)
			{
				product_price = $('#unit_price'+product_id).val();
			}else {
				product_price = promotion_price;
			}
			var action = "add";
			$.ajax({
				url: "../ShopController/action",
				method: "POST",
				data:{
					product_name: product_name,
					product_id: product_id,
					product_quantity: product_quantity,
					product_price: product_price,
					action: action,
					product_image: product_image
				},
				dataType: "json",
				success: function(data)
				{
					$('#table-order').html(data.order_table);
					$('.badge').text(data.cart_item);
				}
			});
		})
	});

</script>
@endsection