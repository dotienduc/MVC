@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			<form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>  
			<h1>Lịch khám</h1>
			<small>Danh sách lịch khám</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- Form controls -->
			<div class="col-sm-12">
				<div class="panel panel-bd lobidrag">
					<div class="panel-heading">
						<div class="btn-group"> 
							<a class="btn btn-primary" href="../AppointentController/listAppointent"> <i class="fa fa-list"></i>  Danh sách lịch khám</a>  
						</div>
					</div>
					<div class="panel-body">
						<form class="col-sm-12" action="../AppointentController/insertAppointent" method="POST">
							<div class="col-sm-3 form-group">
								<label>Họ</label>
								<input type="text" class="form-control" name="firstname" placeholder="Enter firstname" required>
							</div>
							<div class="col-sm-3 form-group">
								<label>Tên </label>
								<input type="text" class="form-control" name="lastname" placeholder="Enter lastname" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Chuyên khoa</label>
								<select name="id_specialist" id="subject" class="form-control action" required="required">
									<option value="">Chọn khoa</option>
									@foreach($specialist as $row)
									<option value="{{ $row->id }}">{{ $row->name_specialist }}</option>
									@endforeach
								</select>
							</div>
							
							<div class="col-sm-6 form-group">
								<label>Số điện thoại</label>
								<input type="number" name="phone" class="form-control" placeholder="Enter Mobile" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Bác sĩ</label>
								<select name="id_doctor" id="doctor" class="form-control action" required="required">
									<option value="">Chọn bác sĩ</option>
								</select>
							</div>
							<div class="col-sm-6 form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" placeholder="Enter Email" required>
							</div>
							
							<div class="col-sm-6 form-group">
								<label>Lịch khám</label>
								<select name="id_timeserving" id="calendar" class="form-control" required="required">
									<option value="">Chọn lịch khám</option>
								</select>
							</div>
							<div class="col-sm-12 form-group">
								<label>Miêu tả</label>
								<textarea id="some-textarea" name="description" class="form-control" rows="3" placeholder="Enter text ..."></textarea>
							</div>     
							<div class="col-sm-12 form-group">
								<div class="col-sm-12 reset-button">
									<button type="submit" name="btn-Save" class="btn btn-success">Lưu</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</section> <!-- /.content -->
		@endsection
		@section('javascript')
		<script type="text/javascript" src="../js/filterSelectBox.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				
			});
		</script>
		@endsection