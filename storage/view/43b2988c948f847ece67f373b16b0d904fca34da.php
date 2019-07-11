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
      <h1>Doctor</h1>
      <small>Doctor list</small>
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
          <div class="btn-group"> 
            <?php if( isset($_SESSION['info']) && $infoAccount[0]->role == 1 ): ?>
            <a class="btn btn-success" href="../BacsiController/formDoctor"> <i class="fa fa-plus"></i> Thêm bác sĩ
            </a>  
            <?php endif; ?>
          </div>        
        </div>
        <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Phone </th>
                    <th>Address</th>
                    <th>Update</th>
                  </tr>
                </thead>
                <tbody id="table-list">
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
                  <a class="btn btn-primary" href="../BacsiController/managementDoctor"> <i class="fa fa-list"></i>Danh sách bác sĩ </a>  
                </div>
              </div>
              <div class="panel-body">

                <form class="col-sm-12" id="edit-form" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="hidden" id="hidden_id" name="hidden_id"/>
                    <label>Tên bác sĩ</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Enter First Name" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" id="address" class="form-control" name="address" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter Phone number" required>
                  </div>
                  <div class="form-group">
                    <label>Cập nhật ảnh</label>
                    <img src="" class="img-circle" id="image" alt="User Image" height="50" width="50">
                    <input type="file" name="image" id="picture">
                    <input type="hidden" id="old_picture" name="old_picture">
                  </div>

                  <div class="form-group">
                    <label>Miêu tả</label>
                    <textarea  id="description" name="description" class="form-control" rows="6" placeholder="Enter text ..."></textarea>
                  </div>
                  <div class="form-group">
                    <label>Specialist</label>
                    <select name="specialist" id="specialist" class="form-control" required="required">
                      <?php $__currentLoopData = $specialist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($row->id); ?>"><?php echo e($row->name_specialist); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="reset button">
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
          <button type="button" class="btn btn-danger btn-del" id="">Xóa</button>
        </div>
      </div>
    </div>
  </div>
</div> <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
  $(document).ready(function(){

    fetch_data();

    function fetch_data()
    {
      $.ajax({
        url: "../BacsiController/fetch_data",
        method: "POST",
        success:function(data)
        {
          $('#table-list').html(data);
        }
      });
    }

    $('#edit-form').on('submit', function(e){
      e.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "../BacsiController/formDoctor",
        method: "POST",
        data: form_data,
        dataType: "json",
        success:function(data)
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

    $(document).on('click', '.edit', function(e){
      var doctor_id = $(this).attr('id');
      $.ajax({
        url: "../BacsiController/getDetailDoctor",
        method: "POST",
        data: {doctor_id: doctor_id},
        dataType: "JSON",
        success:function(data)
        {
          $('#name').val(data.name);
          $('#hidden_id').val(data[0]);
          $('#image').attr('src', "../img/team/"+data.image+"");
          $('#old_picture').val(data.image);
          $('#specialist').val(data.id_specialist);
          $('#address').val(data.address);
          $('#phone').val(data.phone);
          $('#email').val(data.email);
          $('#description').val(data.description);
          $('#ordine').modal('show'); 
        }
      });
    });

    $(document).on('click', '.delete', function(e){
      var id = $(this).attr('id');
      $('.btn-del').attr('id', id);
      $('#model-delete').modal('show');
    });

    $(".btn-del").on('click', function(){
      var id_doctor = $(this).attr('id');
      var action = "delete";
      $.ajax({
        url: "../BacsiController/formDoctor",
        method: "POST",
        data: {id_doctor: id_doctor, action: action},
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

    var list = $(document).querySelectorAll('.doctor');
    console.log(list.length);
  });
  
  // for(let i=0; i<tr.length; i++)
  // {
  //   var td = tr.querySelectorAll('td.search');
  //   for(let j = 0; j<td.length;j++)
  //   {
  //     console.log("211");
  //   }
  // }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin/doctorlist.blade.php ENDPATH**/ ?>