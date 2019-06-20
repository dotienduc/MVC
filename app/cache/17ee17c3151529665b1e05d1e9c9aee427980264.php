<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from heatmaponline.com/html/medcative/team-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2019 21:09:52 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medicative Hospital || Health & Medical HTML Template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">

    <!-- Responsive stylesheet  -->
    <link rel="stylesheet" type="text/css" href="../../css/responsive.css">

    <!-- Favicon -->
    <link href="../../img/favicon.png" rel="shortcut icon" type="image/png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="preloader"></div>

    <?php echo $__env->make('partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <section class="inner-bg over-layer-black" style="background-image: url('../../img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Hồ sơ bác sĩ</h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Hồ sơ bác sĩ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team start -->
    <section class="team-area">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-5">
                        
                        <div class="team-item-2">
                            <img src="../../img/team/<?php echo e($doctor['image']); ?>" alt="">
                            <div class="team-contact">
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-content">
                                <h4><a href="#">Dr. <?php echo e($doctor['name']); ?></a></h4>
                                <h6><?php echo e($doctor['name_specialist']); ?></h6>
                                <div class="team-content-icon">
                                    <i class="flaticon-heart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="team-details">
                            <address>
                                <ul>
                                    <li><i class="pe-7s-map-marker"></i><?php echo e($doctor['address']); ?></li>
                                    <li><i class="pe-7s-call"></i>Phone: <?php echo e($doctor['phone']); ?></li>
                                    <li><i class="pe-7s-clock"></i>Friday - Sunday Closed.</li>
                                    <li><i class="pe-7s-mail"></i><a href="mailto:">Email: <?php echo e($doctor['email']); ?></a></li>
                                    <li><i class="pe-7s-global"></i><a href="#">Web: www.bdcoder.com</a></li>
                                </ul>
                            </address>
                        </div>

                        <div class="bg-f8 padding-20 margin-top-50">
                          <div class="footer-item footer-widget-one margin-bottom-10">
                            <div class="footer-title">
                              <h4>Opening Hour</h4>
                              <div class="border-style-2"></div>
                            </div>
                            <ul class="footer-list border-deshed">
                                <?php $__currentLoopData = $calendars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calendar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li class="clearfix"> <span><?php echo e($calendar['weeksday']); ?></span>
                                <div class="value pull-right"><?php echo e($calendar['work_time']); ?></div>
                              </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          </div>
                        </div>


                    </div>
                    <div class="col-md-7 team-area">
                        <div class="team-details-content">
                            <h2><a href="#"> DR. <?php echo e($doctor['name']); ?> </a></h2>
                            <h6>Khoa <?php echo e($doctor['name_specialist']); ?></h6>
                            <h4>Dược sĩ</h4>
                            <p><?php echo e($doctor['description']); ?></p>

                            <h4>Lịch sử chuyên ngành</h4>
                            <ul class="list-style margin-left-10">
                                <li><i class="fa fa-angle-right margin-right-10"></i> Surgical or internal medicine</li>
                                <li><i class="fa fa-angle-right margin-right-10"></i> Age range of patients</li>
                                <li><i class="fa fa-angle-right margin-right-10"></i> Diagnostic or therapeutic</li>
                                <li><i class="fa fa-angle-right margin-right-10"></i> Organ-based or technique-based</li>
                            </ul>
                            <div class="clearfix margin-top-30"> 
                                <div class="skills" data-percent="85%">
                                    <div class="title-bar">
                                      <h5>Cardiology</h5>
                                    </div>
                                    <span>85%</span>
                                    <div class="skillbar-1"></div>  
                                </div>
                                <div class="skills" data-percent="60%">
                                    <div class="title-bar">
                                      <h5>General Practice</h5>
                                    </div>
                                    <span>60%</span>
                                    <div class="skillbar-2"></div>  
                                </div>
                                <div class="skills" data-percent="89%">
                                    <div class="title-bar">
                                      <h5>General surgery</h5>
                                    </div>
                                    <span>89%</span>
                                    <div class="skillbar-3"></div>  
                                </div>
                                <div class="skills" data-percent="60%">
                                    <div class="title-bar">
                                      <h5>Pharmacology</h5>
                                    </div>
                                    <span>60%</span>
                                    <div class="skillbar-4"></div>  
                                </div>
                            </div>
                            <div class="margin-bottom-30">
                                <h4>EDUCATION & MEDICAL TRAINING</h4>
                                <div class="border-style-2 margin-bottom-30"></div>
                                <ul class="list-style margin-left-10">
                                    <li><i class="fa fa-angle-right margin-right-10"></i> <strong>Australasian College of Dermatologists</strong></li>
                                    <li><i class="fa fa-angle-right margin-right-10"></i> Australasian College of Podiatric Surgeons</li>
                                    <li><i class="fa fa-angle-right margin-right-10"></i> Australasian College for Emergency Medicine</li>
                                </ul>
                            </div>
                            <div class="margin-bottom-30">
                                <h4>Training</h4>
                                <div class="border-style-2 margin-bottom-30"></div>
                                <ul class="list-style margin-left-10">
                                    <li><i class="fa fa-angle-right margin-right-10"></i> Royal Australasian College of Medical Administrators</li>
                                    <li><i class="fa fa-angle-right margin-right-10"></i><strong>Royal Australasian College of Physicians</strong> </li>
                                    <li><i class="fa fa-angle-right margin-right-10"></i> Royal College of Pathologists of Australasia</li>
                                </ul>
                            </div>

                            <div class="margin-bottom-30">
                                <h4>CERTIFICATIONS</h4>
                                <div class="border-style-2 margin-bottom-30"></div>
                                <ul class="list-style margin-left-10">
                                    <li><i class="fa fa-angle-right margin-right-10"></i> Surgical or internal medicine</li>
                                    <li><i class="fa fa-angle-right margin-right-10"></i> Age range of patients</li>
                                    <li><i class="fa fa-angle-right margin-right-10"></i> Diagnostic or therapeutic</li>
                                    <li><i class="fa fa-angle-right margin-right-10"></i> Organ-based or technique-based</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team end -->

   <!-- divider start -->
    <section class="service-area over-layer-default" style="background-image:url(../../img/bg/5.jpg);">
        <div class="container padding-bottom-none padding-top-40">
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="service-item style-1 text-white border-right">
                            <div class="service-icon">
                                <i class="pe-7s-call"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#">Give us a Call</a></h5>
                                <p>+970-438-3258</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="service-item style-1 text-white border-right">
                            <div class="">
                                <i class="pe-7s-mail-open"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#">Send us a Message</a></h5>
                                <p>Your_malil@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="service-item style-1 text-white">
                            <div class="">
                                <i class="pe-7s-map-marker"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#">Visit our Location</a></h5>
                                <p>12 New york, USA </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- divider end -->

    <?php echo $__env->make('partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  
    <a href="#" class="scrollup"><i class="pe-7s-up-arrow" aria-hidden="true"></i></a>
    <!-- jQuery -->
    <script type="text/javascript" src="../../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>

    <!-- all plugins and JavaScript -->
    <script type="text/javascript" src="../../js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../../js/css3-animate-it.js"></script>
    <script type="text/javascript" src="../../js/bootstrap-dropdownhover.min.js"></script>
    <script type="text/javascript" src="../../js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../../js/gallery.js"></script>
    <script type="text/javascript" src="../../js/player.min.js"></script>
    <script type="text/javascript" src="../../js/retina.js"></script>
    <script type="text/javascript" src="../../js/comming-soon.js"></script>

    <!-- Main Custom JS -->
    <script type="text/javascript" src="../../js/script.js"></script>

</body>


<!-- Mirrored from heatmaponline.com/html/medcative/team-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2019 21:09:52 GMT -->
</html>
<?php /**PATH C:\xampp\htdocs\mvc\app\views\home/thongTinBacSi.blade.php ENDPATH**/ ?>