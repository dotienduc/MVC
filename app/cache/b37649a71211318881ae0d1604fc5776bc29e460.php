<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                     <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                            <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>   
                    <div class="header-icon">
                        <i class="fa fa-tachometer"></i>
                    </div>
                    <div class="header-title">
                        <h1> Bảng điều khiển</h1>
                        <small> Tính năng bảng điều khiển</small>
                        <ol class="breadcrumb hidden-xs">
                            <li><a href="index-2.html"><i class="pe-7s-home"></i> Trang trủ</a></li>
                            <li class="active">Bảng điều khiển</li>
                        </ol>
                    </div>
                </section>
            <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd cardbox">
                                <div class="panel-body">
                                    <div class="statistic-box">
                                        <h2><span class="count-number">15</span>
                                        </h2>
                                    </div>
                                    <div class="items pull-left">
                                        <i class="fa fa-users fa-2x"></i>
                                        <h4>Active Doctors </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd cardbox">
                                <div class="panel-body">
                                    <div class="statistic-box">
                                        <h2><span class="count-number">3</span>
                                        </h2>
                                    </div>
                                    <div class="items pull-left">
                                    <i class="fa fa-users fa-2x"></i>
                                    <h4>Labratorist</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd cardbox">
                                <div class="panel-body">
                                    <div class="statistic-box">
                                        <h2><span class="count-number">4</span>
                                        </h2>
                                    </div>
                                    <div class="items pull-left">
                                    <i class="fa fa-users fa-2x"></i>
                                    <h4>Accountant</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd cardbox">
                                <div class="panel-body">
                                    <div class="statistic-box">
                                        <h2><span class="count-number">7</span>
                                        </h2>
                                    </div>
                                    <div class="items pull-left">
                                    <i class="fa fa-users fa-2x"></i>
                                    <h4>Receptionist</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                        <!-- datamap -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">  
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Line chart</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <canvas id="lineChart" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- calender -->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Calender</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- monthly calender -->
                                    <div class="monthly_calender">
                                        <div class="monthly" id="m_calendar"></div>
                                    </div>
                                </div>
                                 <div id="map1" class="hidden-xs hidden-sm hidden-md hidden-lg"></div>
                            </div>
                        </div>
                        
                    </div> <!-- /.row -->
                </section> <!-- /.content -->

            </div> <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin/dashboard.blade.php ENDPATH**/ ?>