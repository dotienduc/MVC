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
      <div class="col-sm-12">
       <div id="message"></div>
       <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
          <div class="btn-group"> 
            <a class="btn btn-success" href="../AppointentController/formAppointent"> <i class="fa fa-plus"></i> Thêm lịch khám
            </a>  
          </div>        
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="panel-header">
              <div class="col-sm-8 col-xs-12">
                <div class="dataTables_length">
                  <label>Display 
                    <select name="example_length">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select> records per page</label>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                  <div class="dataTables_length">
                    <div class="input-group custom-search-form">
                      <input type="search" class="form-control" placeholder="search..">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                          <span class="glyphicon glyphicon-search"></span>
                        </button>
                      </span>
                    </div><!-- /input-group -->
                  </div>
                </div>
              </div>

            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Tên người khám</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Nội dung cuộc gặp</th>
                    <th>Tên bác sĩ</th>
                    <th>Lịch khám</th>
                    <th>Chủ đề</th>
                    <th>Trạng thái</th>
                    <th>Update</th>
                  </tr>
                </thead>
                <tbody id="table-list">
                </tbody>
              </table>
            </div>
            <div class="page-nation text-right">
              <ul class="pagination pagination-large">
                <li class="disabled"><span>«</span></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li class="disabled"><span>...</span></li><li>
                  <li><a rel="next" href="#">Next</a></li>
                </ul>
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

                <form class="col-sm-12" id="edit-form" method="POST">
                  <div class="form-group">
                    <label>Họ</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter firstname" required>
                  </div>
                  <div class="form-group">
                    <label>Tên </label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter lastname" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="number" id="phone" name="phone" class="form-control" placeholder="Enter Mobile" required>
                  </div>
                  <div class="form-group">
                    <label>Chuyên khoa</label>
                    <select name="id_specialist" id="subject" class="form-control action" >
                      <option value="">Chọn khoa</option>
                      <?php $__currentLoopData = $specialist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($row['id']); ?>"><?php echo e($row['name_specialist']); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Bác sĩ</label>
                    <select name="id_doctor" id="doctor" class="form-control action">
                      <option value="">Chọn bác sĩ</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Lịch khám</label>
                    <select name="id_timeserving" id="calendar" class="form-control">
                      <option value="">Chọn lịch khám</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                      <option value="">Chọn trạng thái</option>
                      <option value="0">Chờ</option>
                      <option value="1">Duyệt</option>
                    </select>
                  </div>
                  <div class="reset button">
                   <a href="#" class="btn btn-primary">Reset</a>
                   <input type="hidden" name="id_appointent" id="id_appointent">
                   <input type="hidden" name="hidden_idDoctor" id="hidden_idDoctor">
                   <input type="hidden" name="hidden_idTimeserving" id="hidden_idTimeserving">
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
<script type="text/javascript" src="../js/filterSelectBox.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    fetch_data();

    function fetch_data()
    {
      $.ajax({
        url: "../AppointentController/fetch_data",
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
        url: "../AppointentController/editAppointent",
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
      if(e.target.classList.contains('fa'))
      {
        appointent = e.target.parentElement.parentElement.parentElement;
      }else {
        appointent = e.target.parentElement.parentElement;
      }
      var name = appointent.children[0].innerText.split(" ");
      var id_appointent = $(this).attr('id');
      // console.log(appointent.children[5].classList);
      $('#firstname').val(name[0]);
      $('#lastname').val(name[1]);
      $('#email').val(appointent.children[1].innerText);
      $('#phone').val(appointent.children[2].innerText);
      $('#subject').val(appointent.children[6].classList);
      $('#hidden_idDoctor').val(appointent.children[4].classList);
      $('#hidden_idTimeserving').val(appointent.children[5].classList);
      $('#id_appointent').val(id_appointent);
      $('#status').val(appointent.children[7].classList);
      $('#ordine').modal('show');
    });

    $(document).on('click', '.delete', function(e){
      var id = $(this).attr('id');
      $('.btn-del').attr('id', id);
      $('#model-delete').modal('show');
    });

    $(".btn-del").on('click', function(){
      var id_appointent = $(this).attr('id');
      $.ajax({
        url: "../AppointentController/deleteAppointent",
        method: "POST",
        data: {id_appointent: id_appointent},
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin/listOfAppointments.blade.php ENDPATH**/ ?>