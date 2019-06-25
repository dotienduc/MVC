<aside class="main-sidebar">
                <!-- sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="image pull-left">
                            <img src="../assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="info">
                            <h4>Welcome</h4>
                            <p><?php echo e($infoAccount['name']); ?></p>
                        </div>
                    </div>
                   
                    <!-- sidebar menu -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="../DashboardController/dashBoard"><i class="fa fa-hospital-o"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user-md"></i><span>Bác sĩ</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../BacsiController/formDoctor">Thêm bác sĩ</a></li>
                                <li><a href="../BacsiController/managementDoctor">Danh sách bác sĩ</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-list-alt"></i> <span>Lịch làm việc</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../ScheduleController/formSchedule">Thêm lịch làm việc</a></li>
                                <li><a href="../ScheduleController/listSchedule">Danh sách lịch làm việc</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-check-square-o"></i><span>Lịch khám</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../AppointentController/formAppointent">Thêm lịch khám</a></li>
                                <li><a href="../AppointentController/listAppointent">Danh sách lịch khám</a></li>
                            </ul>
                        </li>
                    <li class="treeview">
                            <a href="#">
                                <i class="fa fa-check-square-o"></i><span>Quản lý đơn hàng</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../ShopController/listOrder">Đơn hàng</a></li></li>
                            </ul>
                        </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bed"></i><span>Quản lý tài khoản</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../DashboardController/listAccount">Danh sách tài khoản</a></li>
                        </ul>
                    </li>     
            </ul>
        </div> <!-- /.sidebar -->
    </aside><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin/partial/mainSlidebar.blade.php ENDPATH**/ ?>