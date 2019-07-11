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
			<h1>Bác sĩ</h1>
			<small>Danh sách bác sĩ</small>
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
							<a class="btn btn-primary" href="../BacsiController/managementDoctor"> <i class="fa fa-list"></i>  Danh sách bác sĩ</a>  
						</div>
					</div>
					<div class="panel-body">
						<form class="col-sm-12" action="../BacsiController/formDoctor" method="POST" enctype="multipart/form-data">
							<div class="col-sm-6 form-group">
								<label>Tên bác sĩ</label>
								<input type="text" class="form-control" name="name" placeholder="Enter firstname" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" placeholder="Enter Email" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Địa chỉ</label>
								<input type="text" class="form-control" name="address" placeholder="Address" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Chuyên khoa</label>
								<select name="specialist" class="form-control" required="required">
									<?php $__currentLoopData = $specialist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($row->id); ?>"><?php echo e($row->name_specialist); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<div class="col-sm-6 form-group">
								<label>Số điện thoại</label>
								<input type="number" name="phone" class="form-control" placeholder="Enter Mobile" required>
							</div>

							<div class="col-sm-6 form-group">
								<label >Cập nhật ảnh</label>
								<input type="file" name="image" id="picture">
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
			<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin/formdoctor.blade.php ENDPATH**/ ?>