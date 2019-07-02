@extends('master')
@section('css')
<link rel="stylesheet" href="jquery.lwMultiSelect.css" />
@endsection
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
			<h1>Doctor</h1>
			<small>Danh sách lịch</small>
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
							<a class="btn btn-primary" href="../ScheduleController/listSchedule"> <i class="fa fa-list"></i>  Danh sách lịch làm việc</a>  
						</div>
					</div>
					<div class="panel-body">
						<form class="col-sm-12" action="../ScheduleController/insertSchedule" method="POST">
							<div class="col-sm-6 form-group">
								<label>Chuyên khoa</label>
								<select name="specialist" id="specialist" class="form-control action" required="required">
									<option value="">Chọn chuyên khoa</option>
									@foreach($specialist as $row)
									<option value="{{ $row['id'] }}">{{ $row['name_specialist'] }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-sm-6 form-group">
								<label>Bác sĩ</label>
								<select name="name" id="name" class="form-control change-doctor" required="required">
									<option value="">Chọn bác sĩ</option>
								</select>
							</div>
							<div class="col-sm-6 form-group">
								<label>Ngày làm việc</label>
								<select name="weeksday" id="weeksday" class="form-control change" required="required">
									<option value="">Chọn ngày làm việc</option>
									@foreach($timeserving as $row)
									<option value="{{ $row['weeksday'] }}">{{ $row['weeksday'] }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-sm-6 form-group">
								<label>Khung giờ</label>
								<select name="work_time" id="work_time" class="form-control" required="required">
									<option value="">Chọn giờ làm </option>
								</select>
							</div>

							<div class="col-sm-12 reset-button">
								<button type="submit" class="btn btn-success">Lưu</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</section> <!-- /.content -->
	@endsection
	@section('javascript')
	<script src="jquery.lwMultiSelect.js"></script>
	<script type="text/javascript" src="../js/multiSelectBox.js">
	</script>
	<script type="text/javascript">
		$(".change").change(function(event) {
			if($(this).val() != '')
			{
				var query = $(this).val();
				var id_doctor = $('#name option:selected').val();
				$.ajax({
					url: "../ScheduleController/filterFormSchedule",
					method: "POST",
					data: {query: query, id_doctor: id_doctor},
					success:function(data)
					{
						$('#work_time').html(data);
					}
				});
			}
		});
	</script>
	@endsection