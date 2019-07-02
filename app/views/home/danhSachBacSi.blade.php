@extends('master')
@section('content')
<section class="inner-bg over-layer-black" style="background-image: url('../img/bg/4.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="mini-title inner-style-2">
					<h3>EXPERIENCE Doctor</h3>
					<p><a href="../home/index">Home</a> <span class="fa fa-angle-right"></span> <a href="../BacsiController/listDoctor">Our Doctor</a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Team start -->
<section class="team-area">
	<div class="container">
		<div class="section-content">
			<div class="row">
				<div class="">
					@foreach($doctors as $doctor)
					<div class="col-md-3 clearfix">
						<div class="team-item-2">
							<img src="../img/team/{{ $doctor['image'] }}" alt="">
							<div class="team-contact">
								<ul>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								</ul>
							</div>
							<div class="team-content">
								<h4><a href="../bacsiController/viewProfileDoctor/{{ $doctor['id_doctor'] }}">{{ $doctor['name'] }}</a></h4>
								<h6>{{ $doctor['name_specialist'] }}</h6>
							</div>
							<div class="timetable">
								<div class="item">
									<div class="label">Monday-Friday</div>
									<div class="value">8:00 - 17:00</div>
								</div>
								<div class="item">
									<div class="label">Saturday</div>
									<div class="value">10:00 - 16:00</div>
								</div>
								<div class="item">
									<div class="label">Sunday</div>
									<div class="value">12:00 - 14:00</div>
								</div>
								<a href="../bacsiController/viewProfileDoctor/{{ $doctor['id_doctor'] }}" class="btn-theme text-center btn-block"> Xem hồ sơ</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Team end -->

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