<?php $__env->startSection('css'); ?>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
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
      <h1>Đơn hàng</h1>
      <small>Danh sách hóa đơn</small>
      <ol class="breadcrumb hidden-xs">
        <li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
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
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Tên khách hàng</th>
                  <th>Địa chỉ</th>
                  <th>Số điện thoại</th>
                  <th>Mã hóa đơn</th>
                  <th>Số lượng mua </th>
                  <th>Tổng giá hóa đơn</th>
                  <th>Gửi hàng</th>
                  <th>Update</th>
                </tr>
              </thead>
              <tbody id="table-list">
                <?php $__currentLoopData = $listOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($order['fname']); ?> <?php echo e($order['lname']); ?></td>
                  <td><?php echo e($order['address']); ?></td>
                  <td><?php echo e($order['phone']); ?></td>
                  <td><?php echo e($order['id']); ?></td>
                  <td><?php echo e($order['quantity']); ?></td>
                  <td> $ <?php echo e($order['total']); ?></td>
                  <td><input type="checkbox" id="status<?php echo e($order['id']); ?>" value="<?php echo e($order['status']); ?>" class="switchButton" checked data-toggle="toggle">
                    <input type="hidden" id="hidden_email" value="<?php echo e($order['email']); ?>">
                    <input type="hidden" id="hidden_id<?php echo e($order['id']); ?>" value="<?php echo e($order['id']); ?>">
                  </td>
                  <td><a href="#" class="view" id="<?php echo e($order['id']); ?>" ><button type="button" class="btn btn-success btn-sm">View</button></a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>

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
              <a class="btn btn-primary" href="../BacsiController/managementDoctor"> <i class="fa fa-list"></i>Chi tiết hóa đơn</a>  
            </div>
          </div>
          <div class="panel-body detailOrder">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div> <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    switchButton();

    function switchButton()
    {
      var status = document.querySelectorAll('.switchButton');
      status.forEach((item) => {
        if($(item).val() == 0)
        {
          $(item).prop('checked', false).change();
        }else {
          $(item).prop('disabled', true).change();
        }
      });
      
    }

    $('.switchButton').each(function(){
      $(this).on('change', function(){
        var status = $(this).prop('checked');
        var id_bill = $(this).attr('id').slice(6, 7);
        if(status == true){
          status = 1;
        }else {
          status = 0;
        }
        $.ajax({
          url: "../ShopController/shipping",
          method: "POST",
          data: {status: status, id_bill: id_bill},
          success:function(data)
          {
            setTimeout(() => {
              location.reload();
            }, 200);
          }
        });
      });
    });

    $('.view').on('click', function(e){
      e.preventDefault();
      var id_bill = $(this).attr('id');
      $.ajax({
        url: "../ShopController/detailOrder",
        method: "POST",
        data: {id_bill: id_bill},
        dataType: "json",
        success:function(data)
        {
          setTimeout(() => {
            $('.detailOrder').html(data);
          }, 50)
          $('#ordine').modal('show');
        }
      });
    });
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin/listofinvoices.blade.php ENDPATH**/ ?>