<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/health/forms_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jun 2019 02:03:22 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Thememinister Health Admin panel</title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../../assets/dist/img/ico/favicon.png" type="image/x-icon">

<!-- Start Global Mandatory Style
	=====================================================================-->
	<!-- jquery-ui css -->
	<link href="../../assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
	<!-- Bootstrap -->
	<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!-- Bootstrap rtl -->
	<!--<link href="../../assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
	<!-- Lobipanel css -->
	<link href="../../assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
	<!-- Pace css -->
	<link href="../../assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
	<!-- Font Awesome -->
	<link href="../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<!-- Pe-icon -->
	<link href="../../assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
	<!-- Bootstrap-wysihtml5 css -->
	<link href="../../assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
	<!-- Themify icons -->
	<link href="../../assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
<!-- End Global Mandatory Style
	=====================================================================-->
<!-- Start Theme Layout Style
	=====================================================================-->
	<!-- Theme style -->
	<link href="../../assets/dist/css/stylehealth.min.css" rel="stylesheet" type="text/css"/>
	<!-- Theme style rtl -->
	<!--<link href="../../assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->
<!-- End Theme Layout Style
	=====================================================================-->
</head>
<body class="hold-transition sidebar-mini">        
	<!-- Site wrapper -->
        <div class="wrapper">
                @include('partial.mainHeader')
                <!-- =============================================== -->
                <!-- Left side column. contains the sidebar -->
                @include('partial.mainSlidebar')
                <!-- =============================================== -->
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
                                   <h1>Câu hỏi</h1>
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
                                                   <a class="btn btn-primary" href="../../QuestionController/listQuestion"> <i class="fa fa-list"></i>  Danh sách câu hỏi </a>  
                                           </div>
                                   </div>
                                   <div class="panel-body">
                                    <form class="col-sm-12">
                                           <div class="col-sm-6 form-group">
                                                  <label>Tên</label>
                                                  <input type="text" class="form-control" required value="{{ $question['name'] }}">
                                          </div>
                                          <div class="col-sm-6 form-group">
                                                  <label>Email</label>
                                                  <input type="text" class="form-control" required value="{{ $question['email'] }}">
                                          </div>
                                          <div class="col-sm-12 form-group">
                                                  <label>Chủ đề</label>
                                                  <input type="email" class="form-control"  required value="{{ $question['subject'] }}">
                                          </div> 
                                          <div class="col-sm-12 form-group">
                                                  <label>Nội dung câu hỏi</label>
                                                  <textarea id="some-textarea" class="form-control" rows="10" >{{ $question['message'] }}</textarea>
                                          </div> 
                                          <div class="col-sm-12 reset-button">
                                                  <a href="#" class="btn btn-success answer">Trả lời câu hỏi</a>
                                          </div>
                                  </form>
                          </div>
                  </div>
          </div>
  </div>

</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="modalAnswerQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                      <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLongTitle">Trả lời câu hỏi</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                     <form action="" method="POST" id="form-submit" role="form">

                            <div class="form-group">
                                   <label for="">Tên bác sĩ</label>
                                   <input type="text" class="form-control" name="nameDoctor" value="{{ $infoAccount['name'] }}">
                           </div>
                           <div class="form-group">
                                   <label for="">Chủ đề</label>
                                   <input type="text" class="form-control" name="subject" value="{{ $question['subject'] }}">
                           </div>
                           <label>Nội dung trả lời</label>
                           <textarea name="message" class="form-control" rows="10" ></textarea>

                   </div>
                   <div class="modal-footer">
                          <input type="hidden" name="id_questionHidden" value="{{ $question['id'] }}">
                          <input type="hidden" name="id_emailHidden" value="{{$question['email']}}">
                          <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
          </form>
  </div>
</div>
</div>

@include('partial.footer')
</div> <!-- ./wrapper -->
<!-- Start Core Plugins
	=====================================================================-->
        <!-- jQuery -->
<script src="../../assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<!-- jquery-ui --> 
<script src="../../assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="../../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- lobipanel -->
<script src="../../assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
<!-- Pace js -->
<script src="../../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="../../assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="../../assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- Hadmin frame -->
<script src="../../assets/dist/js/custom1.js" type="text/javascript"></script>

<!-- End Core Plugins
	=====================================================================-->
<!-- Start Theme label Script
	=====================================================================-->
        <!-- Dashboard js -->
        <script src="../../assets/dist/js/custom.js" type="text/javascript"></script>
<!-- End Theme label Script
        =====================================================================-->
<script type="text/javascript">
        $(document).ready(function(){
                $('.answer').click(function(e){
                     e.preventDefault();
                     $('#modalAnswerQuestion').modal('show');
                });

                $('#form-submit').on('submit', function(e){
                     e.preventDefault();
                     var form_data = $(this).serialize();
                     $.ajax({
                            url: "../../QuestionController/answerQuestion",
                            method: "POST",
                            data: form_data,
                            success:function(data)
                            {
                                   $('#modalAnswerQuestion').modal('hide');
                                   setTimeout(() => {
                                     window.location.replace("http://localhost/mvc/public/QuestionController/listQuestion");
                                   }, 50)
                           }
                   });
                });
        });
</script>
</body>

<!-- Mirrored from thememinister.com/health/forms_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jun 2019 02:03:23 GMT -->
</html>
