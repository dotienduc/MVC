<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="jquery.lwMultiSelect.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
									<?php $__currentLoopData = $specialist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($row['id']); ?>"><?php echo e($row['name_specialist']); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
									<?php $__currentLoopData = $timeserving; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($row['weeksday']); ?>"><?php echo e($row['weeksday']); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('javascript'); ?>
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
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin/formschedule.blade.php ENDPATH**/ ?>