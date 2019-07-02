<?php $__env->startSection('css'); ?>
<style>
	.alert{
		animation-name: vanish;
		animation-duration: 3s;
	}
	@keyframes  vanish{
		from{
			opacity: 1;
		}
		to{
			opacity: 0;
		}
	}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-box1"></i>
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
			<h1>Lịch làm việc </h1>
			<small>Danh sách lịch làm việc</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Danh sách lịch làm việc</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12">
				<div id="message"></div>
				<div class="panel panel-bd lobidrag">
					<div class="panel-heading">
						<div class="btn-group"> 
							<a class="btn btn-success" href="../ScheduleController/formSchedule"> <i class="fa fa-plus"></i>Thêm lịch làm việc</a>  
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Doctor Name</th>
										<th>Specialist</th>
										<th>Day</th>
										<th>Time</th>
										<th>Update</th>
									</tr>
								</thead>
								<tbody id="list-schedule">
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section> <!-- /.content -->
		<div id="ordine" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h4 class="modal-title">Update table</h4>
					</div>
					<div class="modal-body">
						<div class="panel panel-bd lobidrag">
							<div class="panel-heading">
								<div class="btn-group"> 
									<a class="btn btn-primary" href="../BacsiController/managementDoctor"> <i class="fa fa-list"></i>Danh sách lịch</a>  
								</div>
							</div>
							<div class="panel-body">

								<form class="col-sm-12" id="edit-form" method="POST">
									<div class="form-group">
										<label>Bác sĩ : <lale id="doctor_name"></lale></label>
									</div>
									<div class="form-group">
										<label>Chuyên khoa : <lale id="speciacal"></lale></label>
									</div>
									<div class="form-group">
										<label>Ngày làm việc</label>
										<select name="weeksday" id="weeksday" class="form-control  change" required="required">
											<option value="">Chọn ngày làm việc</option>
											<?php $__currentLoopData = $timeserving; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($row['weeksday']); ?>"><?php echo e($row['weeksday']); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
									<div class="form-group">
										<label>Khung giờ</label>
										<select name="work_time" id="work_time" class="form-control" required="required">
											<option value="">Chọn giờ làm </option>
										</select>
									</div>
									<div class="reset button">
										<input type="hidden" id="hidden_time" name="hidden_time">
										<input type="hidden" id="hidden_idTimeserving" name="hidden_idTimeserving">
										<input type="hidden" id="hidden_idDoctor" name="hidden_idDoctor">
										<button type="submit" name="btn-Edit" class="btn btn-success editDoctor">Lưu</button>
									</div>
								</form>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="model-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Cảnh báo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Bạn có chắc chắn không ? 
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-danger btn-del" title="" id="">Xóa</button>
					</div>
				</div>
			</div>
		</div>
		<?php $__env->stopSection(); ?>
		<?php $__env->startSection('javascript'); ?>
		<script>
			$(document).ready(function(){
				$(document).on('click', '.btn-edit', function(e){
					var id_timeserving = $(this).attr('id');
					var id_doctor = $(this).attr('title');
					if(e.target.classList.contains('fa'))
					{
						var work_time = e.target.parentElement.parentElement.previousElementSibling.innerText;
						var weeksday = e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.textContent;
						var name_doctor = e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
						var speciacal = e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
					}else{
						var work_time = e.target.parentElement.previousElementSibling.innerText;
						var weeksday = e.target.parentElement.previousElementSibling.previousElementSibling.textContent;
						var name_doctor = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
						var speciacal = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
					}
					$('#doctor_name').text(name_doctor);
					$('#speciacal').text(speciacal);
					$('#weeksday').val(weeksday);
					$('#ordine').modal('show');
					$('#hidden_idTimeserving').val(id_timeserving);
					$('#hidden_time').val(work_time);
					$('#hidden_idDoctor').val(id_doctor);
				});

				$('#edit-form').on('submit', function(e){
					e.preventDefault();
					var form_data = $(this).serialize();
					$.ajax({
						url: "../ScheduleController/editTimeserving",
						method: "POST",
						data: form_data,
						dataType: "json",
						success: function(data)
						{
							$('#ordine').modal('hide');
							$('#message').html(data.success);
							fetch_data();
							setTimeout(() => {
								$('.alert').remove()
							}, 3000);
						}
					});
				});

				fetch_data();

				function fetch_data()
				{
					$.ajax({
						url: "../ScheduleController/fetch_data",
						method: "POST",
						success:function(data)
						{
							$('#list-schedule').html(data);
						}
					});
				}
				$(document).on('click', '.delete', function(e){
					var id_timeserving = $(this).attr('id');
					var id_doctor = $(this).attr('title');
					$('.btn-del').attr('id', id_timeserving);
					$('.btn-del').attr('title', id_doctor);
					$('#model-delete').modal('show');
				});

				$(".btn-del").on('click', function(){
					var id_timeserving = $(this).attr('id');
					var id_doctor = $(this).attr('title');	
					$.ajax({
						url: "../ScheduleController/deleteSchedule",
						method: "POST",
						data: {id_timeserving: id_timeserving, id_doctor: id_doctor},
						dataType: "json",
						success:function(data)
						{
							$('#model-delete').modal('hide');
							$('#message').html(data.success);
							fetch_data();
							setTimeout(() => {
								$('.alert').remove()
							}, 3000);
						}
					});
				});
			});
		</script>
		<script src="jquery.lwMultiSelect.js"></script>
		<script type="text/javascript">
			$(".change").change(function(e) {
				if($(this).val() != '')
				{
					var time = $('#hidden_time').val();
					var query = $(this).val();
					$.ajax({
						url: "../ScheduleController/selectTimework",
						method: "POST",
						data: {query: query, time: time},
						success:function(data)
						{
							$('#work_time').html(data);
						}
					});
				}
			});
		</script>
		<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin/schedulelist.blade.php ENDPATH**/ ?>