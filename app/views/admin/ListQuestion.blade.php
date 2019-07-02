@extends('master')
@section('content')
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
      <h1>Câu hỏi</h1>
      <small>Danh sách câu hỏi</small>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Chủ đề</th>
                  <th>Nội dung</th>
                  <th>Trạng thái</th>
                  <th>Cập nhật</th>
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
@endsection
@section('javascript')
<script type="text/javascript">
  $(document).ready(function(){
    fetch_data();
    function fetch_data()
    {
      $.ajax({
        url: "../QuestionController/fetch_data",
        method: "POST",
        success:function(data)
        {
          $('#table-list').html(data);
        }
      })
    }
  });
</script>
@endsection
