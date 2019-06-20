<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from heatmaponline.com/html/medcative/shop-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jun 2019 02:12:30 GMT -->
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Medicative Hospital || Health & Medical HTML Template</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="../../css/style.css">

	<!-- Responsive stylesheet  -->
	<link rel="stylesheet" type="text/css" href="../../css/responsive.css">

	<!-- Favicon -->
	<link href="../../img/favicon.png" rel="shortcut icon" type="image/png">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	@include('partial.header')

	<!-- SHOPING CART AREA START -->
	<section class="shoping-cart-area bg-f8">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="blog-item">
						<div class="blog-images">
							<div class="blog-img"><a href="#"><img src="../../img/shop/{{ $product['image'] }}" alt=""></a></div>
						</div>
						<div class="blog-content">
							<a href="#"><h4>{{ $product['name'] }}</h4></a>
							<div class="blog-date margin-bottom-20 margin-top-30">
								@if($product['promotion_price'] == 0)
								<h3>$ {{ $product['unit_price'] }}<sub>/Only</sub></h3>
								@else
								<h3 >$ <del class="text-muted"> {{ $product['unit_price'] }} </del>{{ $product['promotion_price'] }}<sub>/Only</sub></h3>
								@endif
							</div>
							<p>{{ $product['description'] }}</p>
							<input type="hidden" name="hidden_name" id="name{{ $product['name'] }}" value="{{ $product['name'] }}">
							<input type="hidden" name="hidden_name" id="name{{ $product['name'] }}" value="{{ $product['name'] }}">
							<input type="hidden" name="hidden_name" id="name{{ $product['name'] }}" value="{{ $product['name'] }}">
							<a href="#" class="btn btn-simple add_cart" id="{{ $product['id'] }}">Add to Cart</a>
							<a href="#" class="btn btn-simple">Buy Now</a>
						</div>
					</div>
				</div>
			</div>  
		</div>
	</section>
	<!-- SHOPING CART AREA END -->


	@include('partial.footer')

	<section class="footer-copy-right bg-f9">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<p>© 2018, All Rights Reserved, Design & Developed By:<a href="#"> TributeTheme</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer Style End -->


	<a href="#" class="scrollup"><i class="pe-7s-up-arrow" aria-hidden="true"></i></a>
	<!-- jQuery -->
	<script type="text/javascript" src="../../js/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>

	<!-- all plugins and JavaScript -->
	<script type="text/javascript" src="../../js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="../../js/css3-animate-it.js"></script>
	<script type="text/javascript" src="../../js/bootstrap-dropdownhover.min.js"></script>
	<script type="text/javascript" src="../../js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../../js/gallery.js"></script>
	<script type="text/javascript" src="../../js/player.min.js"></script>
	<script type="text/javascript" src="../../js/retina.js"></script>
	<script type="text/javascript" src="../../js/comming-soon.js"></script>

	<!-- Main Custom JS -->
	<script type="text/javascript" src="../../js/script.js"></script>


</body>


<!-- Mirrored from heatmaponline.com/html/medcative/shop-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jun 2019 02:12:30 GMT -->
</html>
<script type="text/javascript" src="../../js/fly_to_cart.js"></script>


