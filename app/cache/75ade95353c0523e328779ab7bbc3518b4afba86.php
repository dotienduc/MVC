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
      <h1>Tài khoản</h1>
      <small>Danh sách tài khoản</small>
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
            <a class="btn btn-success btn-add" href="#"> <i class="fa fa-plus"></i> Thêm tài khoản
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Role </th>
                    <th>Status</th>
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
                  <a class="btn btn-primary" href="../DashboardController/listAccount"> <i class="fa fa-list"></i>Danh sách tài khoản </a>  
                </div>
              </div>
              <div class="panel-body">

                <form class="col-sm-12" id="edit-form" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Tên tài khoản</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Enter First Name" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" value="" id="password" class="form-control" name="password"  data-parsley-length="[8, 16]" data-parsley-trigger="keyup" placeholder="Enter password">
                  </div>
                  <div class="form-group">
                    <label>Repeat Password</label>
                    <input type="password" value="" id="repeatpassword" class="form-control" name="repeatpassword"  data-parsley-equalto="#password" data-parsley-trigger="keyup" placeholder="Enter repeat password">
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
                    <label>Quyền sử dụng</label>
                    <select name="role" id="role" class="form-control" required="required">
                      <option value="0">Bác sĩ</option>
                      <option value="1">Người quản trị</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status-value" id="status-value" class="form-control" required="required">
                      <option value="0">Không hoạt động</option>
                      <option value="1">Hoạt động</option>
                    </select>
                  </div>
                  <div class="reset button">
                   <a href="#" class="btn btn-primary">Reset</a>
                   <input type="hidden" name="id_account" id="id_account" >
                   <input type="hidden" name="status" value="1">
                   <input type="hidden" name="action" id="action" value="add">
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
        url: "../AccountController/fetch_data",
        method: "POST",
        success:function(data)
        {
          $('#table-list').html(data);
        }
      });
    }

    $('.btn-add').on('click', function(e){
      e.preventDefault();
      $('#edit-form')[0].reset();
      $('#edit-form')[0].children[2].style.display = 'block';
      $('#edit-form')[0].children[3].style.display = 'block';
      $('#edit-form')[0].children[7].style.display = 'none';
      $('#action').val('add');
      $('#ordine').modal('show'); 
    });

    $('#edit-form').on('submit', function(e){
      e.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "../AccountController/actionAccount",
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
      // e.preventDefault();
      // $('#ordine').modal('show');
      var account ;
      var id_account = $(this).attr('id');
      if(e.target.classList.contains('fa'))
      {
        account = e.target.parentElement.parentElement.parentElement;
      }else {
        account = e.target.parentElement.parentElement;
      }
      $('#edit-form')[0].children[2].style.display = 'none';
      $('#edit-form')[0].children[3].style.display = 'none';
      $('#edit-form')[0].children[7].style.display = 'block';
      $('#name').val(account.children[0].innerText);
      $('#email').val(account.children[1].innerText);
      $('#address').val(account.children[3].innerText);
      $('#phone').val(account.children[2].innerText);
      $('#role').val(account.children[4].classList);
      $('#id_account').val(id_account);
      $('#action').val('edit');
      $('#ordine').modal('show'); 
    });

    $(document).on('click', '.delete', function(e){
      var id = $(this).attr('id');
      $('.btn-del').attr('id', id);
      $('#model-delete').modal('show');
    });

    $(".btn-del").on('click', function(){
      var id_account = $(this).attr('id');
      var action = "delete";
      $.ajax({
        url: "../AccountController/actionAccount",
        method: "POST",
        data: {id_account: id_account, action: action},
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
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin/listAccount.blade.php ENDPATH**/ ?>