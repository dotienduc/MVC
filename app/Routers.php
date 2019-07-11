<?php 

use \App\core\Router;

Router::register('/Home/index');
Router::register('/Home/lienHe');
Router::register('/ShopController/shop');
Router::register('/home/addAppoinment');
Router::register('/home/makeAppointment');
Router::register('/Home/addQuestion');
//Doctor
Router::register('/BacsiController/listDoctor');
Router::register('/bacsiController/viewProfileDoctor/id');

Router::register('/BacsiController/formDoctor');
Router::register('/BacsiController/managementDoctor');
Router::register('/BacsiController/fetch_data');
Router::register('/BacsiController/getDetailDoctor');

//Shopping
Router::register('/ShopController/shoppingCart');
Router::register('/ShopController/checkout');
Router::register('/ShopController/productDetail/id');
Router::register('/ShopController/action');
Router::register('/ShopController/payBill');
Router::register('/ShopController/getItemInCart');

//Blog
Router::register('/blogController/blog');
Router::register('/BlogController/getBlog/id');
Router::register('/BlogController/addComment');
Router::register('/BlogController/getListComments');

//Admin
Router::register('/DashboardController/dashBoard');

//Login
Router::register('/DashboardController/login');
Router::register('/AuthController/login');

//Register
Router::register('/DashboardController/register');

//Logout
Router::register('/DashboardController/logout');

//Schedule
Router::register('/ScheduleController/formSchedule');
Router::register('/ScheduleController/listSchedule');
Router::register('/ScheduleController/editTimeserving');
Router::register('/ScheduleController/fetch_data');
Router::register('/ScheduleController/selectTimework');
Router::register('/ScheduleController/multiSelect');
Router::register('/ScheduleController/filterFormSchedule');
Router::register('/ScheduleController/insertSchedule');
Router::register('/ScheduleController/deleteSchedule');

//Appoinent
Router::register('/AppointentController/formAppointent');
Router::register('/AppointentController/listAppointent');
Router::register('/AppointentController/fetch_data');
Router::register('/AppointentController/deleteAppointent');
Router::register('/AppointentController/editAppointent');
Router::register('/AppointentController/insertAppointent');
Router::register('/AppointentController/cofirmEmail/last_id/confirmCode');

//Confirm
Router::register('/AppointentController/cofirmEmail/id/confirmCode');

//Management Order
Router::register('/ShopController/listOrder');
Router::register('/ShopController/shipping');
Router::register('/ShopController/detailOrder');

//Management Account
Router::register('/DashboardController/listAccount');
Router::register('/AccountController/fetch_data');
Router::register('/AccountController/actionAccount');

//Management Question
Router::register('/QuestionController/listQuestion');
Router::register('/QuestionController/formQuestion/id');
Router::register('/QuestionController/fetch_data');
Router::register('/QuestionController/answerQuestion');