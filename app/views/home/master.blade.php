<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from heatmaponline.com/html/medcative/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2019 21:09:12 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medicative Hospital || Health & Medical HTML Template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Responsive stylesheet  -->
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">

    <!-- Favicon -->
    <link href="../img/favicon.png" rel="shortcut icon" type="image/png">

    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- <div class="preloader"></div> -->

    @include('partial.header')

    @yield('content')

    @include('partial.footer')

    <section class="footer-copy-right bg-f9">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p>© 2018, All Rights Reserved, Design & Developed By:<a href="#"> TributeTheme</a></p>
        </div>
    </div>
</div>
</section>
<!-- Footer Style End -->


<a href="#" class="scrollup"><i class="pe-7s-up-arrow" aria-hidden="true"></i></a>
<!-- jQuery -->
<script type="text/javascript" src="../js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<!-- all plugins and JavaScript -->
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/css3-animate-it.js"></script>
<script type="text/javascript" src="../js/bootstrap-dropdownhover.min.js"></script>
<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
<script type="text/javascript" src="../js/gallery.js"></script>
<script type="text/javascript" src="../js/player.min.js"></script>
<script type="text/javascript" src="../js/retina.js"></script>
<script type="text/javascript" src="../js/comming-soon.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="../js/map.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsTvi2dmx_Bnel6F0POzTg6-TaQ16JeDs&amp;callback=initMap" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        load_cart();
        function load_cart()
        {
            $.ajax({
                url: "../ShopController/getItemInCart",
                method: "POST",
                dataType: "json",
                success:function(data)
                {
                    $('#table-order').html(data.order_table);
                    $('.badge').text(data.cart_item);
                }
            });
        }
    });
</script>
<!-- Main Custom JS -->
<script type="text/javascript" src="../js/script.js"></script>
@yield('javascript')
</body>


<!-- Mirrored from heatmaponline.com/html/medcative/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2019 21:09:41 GMT -->
</html>

