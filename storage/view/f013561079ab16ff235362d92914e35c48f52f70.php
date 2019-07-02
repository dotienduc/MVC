<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/health/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2019 21:02:37 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Thememinister Health Admin panel</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../assets/dist/img/ico/favicon.png" type="image/x-icon">
    
    <!-- Bootstrap -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!--<link href="../assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Pe-icon-7-stroke -->
    <link href="../assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
    <!-- style css -->
    <link href="../assets/dist/css/stylehealth.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style rtl -->
    <!--<link href="../assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->
    <style>
       .box
       {
          width:100%;
          max-width:600px;
          background-color:#f9f9f9;
          border:1px solid #ccc;
          border-radius:5px;
          padding:16px;
          margin:0 auto;
      }
      input.parsley-success,
      select.parsley-success,
      textarea.parsley-success {
         color: #468847;
         background-color: #DFF0D8;
         border: 1px solid #D6E9C6;
     }

     input.parsley-error,
     select.parsley-error,
     textarea.parsley-error {
         color: #B94A48;
         background-color: #F2DEDE;
         border: 1px solid #EED3D7;
     }

     .parsley-errors-list {
         margin: 2px 0 3px;
         padding: 0;
         list-style-type: none;
         font-size: 0.9em;
         line-height: 0.9em;
         opacity: 0;

         transition: all .3s ease-in;
         -o-transition: all .3s ease-in;
         -moz-transition: all .3s ease-in;
         -webkit-transition: all .3s ease-in;
     }

     .parsley-errors-list.filled {
         opacity: 1;
     }

     .parsley-type, .parsley-required, .parsley-equalto{
      color:#ff0000;
  }

</style>
</head>
<body>
    <!-- Content Wrapper -->
    <div class="login-wrapper">
        <div class="back-link">
            <a href="../DashboardController/login" class="btn btn-success">Back to Login</a>
        </div>
        <div class="container-center lg">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="view-header">
                        <div class="header-icon">
                            <i class="pe-7s-unlock"></i>
                        </div>
                        <div class="header-title">
                            <h3>Register</h3>
                            <small><strong>Please enter your data to register.</strong></small>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="../DashboardController/register" id="registerForm" method="POST" novalidate>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Username</label>
                                <input type="text" value="" id="username" class="form-control" name="username" required="required" data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" value="" id="password" class="form-control" name="password" required="required" data-parsley-length="[8, 16]" data-parsley-trigger="keyup">
                                <span class="help-block small" >Your hard to guess password</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Repeat Password</label>
                                <input type="password" value="" id="repeatpassword" class="form-control" name="repeatpassword" required="required" data-parsley-equalto="#password" data-parsley-trigger="keyup">
                                <span class="help-block small" >Please repeat your pasword</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Email Address</label>
                                <input type="text" value="" id="email" class="form-control" name="email" required="required" data-parsley-type="email" data-parsley-trigger="keyup">
                                <span class="help-block small">Your address email to contact</span>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-warning" name="register" type="submit">Register</button>
                            <a class="btn btn-primary" href="login.html">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <!-- jQuery -->
    <script src="../assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
    <!-- bootstrap js -->
    <script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#registerForm').parsley();
        });
    </script>
</body>

<!-- Mirrored from thememinister.com/health/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2019 21:02:37 GMT -->
</html><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin/register.blade.php ENDPATH**/ ?>