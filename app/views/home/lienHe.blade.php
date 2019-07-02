@extends('master')
@section('css')
<style>
	.box
	{
		width:100%;
		max-width:600px;
		background-color:#f9f9f9;
		border:1px solid #ccc;
		border-radius:5px;
		padding:16px;
		margin:0 auto;
	}
	input.parsley-success,
	select.parsley-success,
	textarea.parsley-success {
		color: #468847;
		background-color: #DFF0D8;
		border: 1px solid #D6E9C6;
	}

	input.parsley-error,
	select.parsley-error,
	textarea.parsley-error {
		color: #B94A48;
		background-color: #F2DEDE;
		border: 1px solid #EED3D7;
	}

	.parsley-errors-list {
		margin: 2px 0 3px;
		padding: 0;
		list-style-type: none;
		font-size: 0.9em;
		line-height: 0.9em;
		opacity: 0;

		transition: all .3s ease-in;
		-o-transition: all .3s ease-in;
		-moz-transition: all .3s ease-in;
		-webkit-transition: all .3s ease-in;
	}

	.parsley-errors-list.filled {
		opacity: 1;
	}
	
	.parsley-type, .parsley-required, .parsley-equalto{
		color:#ff0000;
	}
	
</style>
@endsection
@section('content')
<section class="inner-bg over-layer-black" style="background-image: url('../img/bg/4.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="mini-title inner-style-2">
					<h3>Contact Us</h3>
					<p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Contact</a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="section-content">
			<div class="row">
				<div class="col-md-7">
					<div class="section-title margin-left-20 ">
						<h6>Contact</h6>
						<h2>Get in Touch</h2>
						<div class="small-line-border-2"></div>
					</div>
					<div id="message"></div>
					<form id="ajax-contact" method="post" action="#">
						<div class="col-md-6">
							<input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
						</div>
						<div class="col-md-6">
							<input type="email" name="email" id="email" class="form-control" placeholder="Your Email"  required required data-parsley-type="email" data-parsley-trigger="keyup">
						</div>
						<div class="col-md-12">
							<input type="text" name="subject" class="form-control" placeholder="Subject" id="subject" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup">
						</div>
						<div class="col-md-12">
							<div class="contact-textarea">
								<textarea class="form-control" rows="6" placeholder="Wright Message" id="message" name="message" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"></textarea>
								<button class="btn btn-theme" type="submit" id="submit" value="Submit Form">Send Message</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-5 contact-info margin-top-60">
					<div class="service-item style-1 bg-f8">
						<div class="service-icon">
							<i class="pe-7s-map"></i>
						</div>
						<div class="content">
							<h5><a href="#" class="color-333">Contact Info</a></h5>
							<p>5B Streat, City 50987 New Town US, <br>Khulna, BD</p>
						</div>
					</div>
					<div class="service-item style-1 bg-f8">
						<div class="">
							<i class="pe-7s-clock"></i>
						</div>
						<div class="content">
							<h5><a href="#" class="color-333">Business Hours</a></h5>
							<p>Monday-Friday: 10am to 8pm <br>Saturday: 11am to 3pm</p>
						</div>
					</div>
					<div class="service-item style-1 bg-f8">
						<div class="">
							<i class="pe-7s-mail-open"></i>
						</div>
						<div class="content">
							<h5><a href="#" class="color-333">Email</a></h5>
							<p>info@bdcoder.com <br> set-info@bdcoder.com </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="map"></div>
</section>

<!-- divider start -->
<section class="service-area over-layer-default" style="background-image:url(img/bg/5.jpg);">
	<div class="container padding-bottom-none padding-top-40">
		<div class="section-content">
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<div class="service-item style-1 text-white border-right">
						<div class="service-icon">
							<i class="pe-7s-call"></i>
						</div>
						<div class="content">
							<h5><a href="#">Give us a Call</a></h5>
							<p>+970-438-3258</p>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="service-item style-1 text-white border-right">
						<div class="">
							<i class="pe-7s-mail-open"></i>
						</div>
						<div class="content">
							<h5><a href="#">Send us a Message</a></h5>
							<p>Your_malil@gmail.com</p>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="service-item style-1 text-white">
						<div class="">
							<i class="pe-7s-map-marker"></i>
						</div>
						<div class="content">
							<h5><a href="#">Visit our Location</a></h5>
							<p>12 New york, USA </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- divider end -->
@endsection
@section('javascript')
<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#ajax-contact').parsley();

		$('#ajax-contact').on('submit', function(e){
			e.preventDefault();
			if($('#ajax-contact').parsley().isValid())
			{
				$.ajax({
					url: "../Home/addQuestion",
					method: 'POST',
					data: $(this).serialize(),
					dataType: "JSON",
					beforeSend:function(){
						$('#submit').attr('disabled','disabled');
						$('#submit').val('Submitting...');
					},
					success:function(data)
					{
						$('#ajax-contact')[0].reset();
						$('#ajax-contact').parsley().reset();
						$('#submit').attr('disabled',false);
						$('#submit').val('Submit');
						$('#message').html(data.success);
					}
				});
			}
		});
	});
</script>
@endsection