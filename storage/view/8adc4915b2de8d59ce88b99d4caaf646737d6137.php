<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from heatmaponline.com/html/medcative/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2019 21:09:56 GMT -->
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
                        <h3>Blog</h3>
                        <p><a href="index-one.html">Trang trủ</a> <span class="fa fa-angle-right"></span> <a href="#">Blog</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts -->
    <div class="bg-f8">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="margin-bottom-30">
                        <img class="img-responsive" src="../../img/blog/w2.jpg" alt="">
                        <div class="blog-post">
                            <ul class="list-inline blog-info">
                                <li>By <a href="#"><?php echo e($blog['author']); ?></a></li>
                                <li>In <a href="#">Design</a></li>
                                <li>Posted <?php echo e(date('d-M-Y', strtotime($blog['time_post']))); ?></li>
                            </ul>
                            <h3><a href="#"><?php echo e($blog['blog_name']); ?></a></h3>
                            <p><?php echo e($blog['content']); ?></p>
                            <p>Pellentesque eleifend metus vitae commodo finibus. Proin eget mi a sem placerat facilisis. Aenean interdum aliquet sapien, non scelerisque massa vestibulum ut. Quisque mollis, ante nec volutpat dignissim, lectus libero porta magna, at volutpat massa orci a turpis. Duis tincidunt nunc magna, non semper metus tempus ut. Duis vulputate enim condimentum posuere lacinia. Ut venenatis massa ex.</p>
                            <blockquote>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing duis mollis, est non commodo luctus elit posuere erat a ante. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis lorem ipsum dolor sit amet, consectetur adipiscing"</p>
                            </blockquote>
                            <p>Sed placerat diam auctor eget. Mauris tellus eros, iaculis id leo quis, finibus aliquet ipsum. Duis volutpat lacus in purus bibendum, at sollicitudin eros malesuada. Sed nec diam a eros eleifend mattis. Phasellus in facilisis enim. Vestibulum sodales lacinia lectus, quis efficitur velit posuere sed.</p>
                        </div>
                    </div>
                    <div class="mini-title">
                        <h3>Comments</h3>
                    </div>

                    <div id="load_comment">
                    </div>
                    <hr>
                    <div id="comment_message"></div>
                    <div class="mini-title">
                        <h3>Post a Comment</h3>
                    </div>
                    <!-- Form -->
                    <form action="../../BlogController/postComment" method="post" id="formComment">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <input type="text" name="comment_sender_name" id="comment_sender_name" placeholder="Enter your name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea rows="8" name="comment" id="comment" placeholder="Write comment here ..." class="form-control"></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="hidden_id" id="parent_id" value="0">
                        <input type="hidden" name="id_blog" id="id_blog" value="<?php echo e($blog['id']); ?>">                            <p><button type="submit" class="btn btn-theme hvr-bounce-to-top">Submit</button></p>
                    </form>
                    <!-- End Form -->
                </div>
                <div class="col-md-3">
                    <div class="blog-sideber">
                        <div class="widget">
                            <div class="sideber-title">
                                <h4>Bài viết gần đây</h4>
                            </div>
                            <div class="footer-item-3 style-1 news-item">
                                <?php $__currentLoopData = $recentBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="news-area clearfix">
                                    <div class="news-img">
                                        <a href="#">
                                            <img height="50px" src="../../img/blog/<?php echo e($blog['image']); ?>" alt="">
                                            <span class="fa fa-link"></span>
                                        </a>
                                    </div>
                                    <div class="news-content">
                                        <a href="../../BlogController/getBlog/<?php echo e($blog['id']); ?>"><?php echo e($blog['blog_name']); ?></a><br>
                                        <span><?php echo e(date('d-M-Y', strtotime($blog['time_post']))); ?></span>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                      <div class="widget clearfix">
                        <div class="sideber-title">
                            <h4>Từ khóa phổ biến</h4>
                        </div>
                        <div class="sideber-content">
                            <ul class="list-inline tags margin-top-20">
                              <li class="hvr-rectangle-out"> <a href="#"> Resources </a> </li>
                              <li class="hvr-rectangle-out"> <a href="#"> News </a> </li>
                              <li class="hvr-rectangle-out"> <a href="#"> Recent Project</a> </li>
                              <li class="hvr-rectangle-out"> <a href="#"> Events </a> </li>
                              <li class="hvr-rectangle-out"> <a href="#"> Alerts</a> </li>
                              <li class="hvr-rectangle-out"> <a href="#"> Complete Project</a> </li>
                          </ul>
                      </div>
                  </div>
          </div>
      </div>
  </div>
</div>
</div>
<!-- End Blog Posts -->

<!-- divider start -->
<section class="service-area over-layer-default" style="background-image:url(img/bg/5.jpg);">
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

<script>
    $(document).ready(function(){
        $('#formComment').on('submit', function(e){
            e.preventDefault();

            var form_data = $(this).serialize();

            $.ajax({
                url: "../../BlogController/addComment",
                method: "POST",
                data: form_data,
                dataType: "JSON",
                success:function(data)
                {
                    if(data.error != '')
                    {
                        $('#formComment')[0].reset();
                        $('#comment_message').html(data.error);
                        $('#hidden_id').val('0');
                        fetch_data();
                    }
                }
            });
        });

        fetch_data();

        function fetch_data()
        {
            var id_blog = $('#id_blog').val();
            $.ajax({
                url: "../../BlogController/getListComments",
                method: "POST",
                data: {id_blog : id_blog},
                success:function(data)
                {
                    $('#load_comment').html(data);
                }
            });
            setInterval(() => {
                var filterWords = ["con chó", "dumb", "couch potato", "con cặc", "mẹ", "chết", "súc vật"];
                var rgx = new RegExp(filterWords.join("|"), "gi");
                function wordFilter(str) {           
                    return str.replace(rgx, "****");            
                }
                var listComments = document.querySelectorAll('.comment');
                for(let i = 0; i< listComments.length; i++)
                {
                    listComments[i].childNodes[3].textContent = wordFilter(listComments[i].childNodes[3].textContent);
                }
            }, 50);
        }

        $(document).on('click', '.reply', function(e){
            e.preventDefault();
            var comment_id = $(this).attr('id');
            $('#parent_id').val(comment_id);
            $('#comment_sender_name').focus();
        });
    });
</script>
</body>


<!-- Mirrored from heatmaponline.com/html/medcative/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2019 21:09:58 GMT -->
</html><?php /**PATH C:\xampp\htdocs\mvc\app\views\home/chitietblog.blade.php ENDPATH**/ ?>