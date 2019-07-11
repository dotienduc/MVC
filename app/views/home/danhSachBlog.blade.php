@extends('master')
@section('content')
<section class="inner-bg over-layer-black" style="background-image: url('../img/bg/4.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="mini-title inner-style-2">
					<h3>Blog</h3>
					<p><a href="index-one.html">Trang trủ</a> <span class="fa fa-angle-right"></span> <a href="#">Blog</a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="blog-area bg-f8 animatedParent animateOnce">
	<div class="container">
		<div class="section-content">
			<div class="row">
				<div class="blog-feature">
					@foreach($blogs as $blog)
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="blog-item style-1">
							<div class="blog-date text-center">
								<i class="pe-7s-link"></i>
							</div>
							<div class="blog-img"><a href="#"><img src="../img/blog/{{$blog->image}}" alt=""></a>
								<div class="blog-event-date">
									<h3>{{ date('d', strtotime($blog->time_post)) }} <small>{{ date('M', strtotime($blog->time_post)) }}</small></h3>
								</div>
							</div>
							<div class="blog-content">
								<a href="#"><h4>{{ $blog->blog_name }}</h4></a>
								@php
								$d = 0;
								foreach($listComment as $row)
								{
									if($row->id_blog == $blog->id)
									{
										$d++;
									}
								}
								@endphp
								<i class="fa fa-user-o"></i> <a href="#">Admin</a> | <i class="fa fa-comment-o"></i><a href="#"> Bình luận: @php echo $d;  @endphp</a>
								<p>{{ $blog->content }}</p>
								<a href="../BlogController/getBlog/{{ $blog->id }}" class="btn btn-simple">Đọc tiếp</a>

							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
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