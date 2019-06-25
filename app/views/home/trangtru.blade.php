@extends('master')
@section('css')
<link rel="stylesheet" href="jquery.lwMultiSelect.css" />
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
@endsection
@section('content')
<!-- Start  bootstrap-touch-slider Slider -->
<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">
        <!-- Third Slide -->
        @foreach($banners as $row)
        <div class="item">
            <!-- Slide Background -->
            <img src="../img/bg/{{ $row['image'] }}" alt="Slider Images"  class="slide-image"/>
            <div class="bs-slider-overlay"></div>

            <div class="slide-text slide_style_left">
                <h1 data-animation="animated fadeInRight"> <span class="color-defult"> {{ $row['text1'] }}</span></h1>
                <p data-animation="animated fadeInLeft">{{ $row['text2'] }}.</p>
                <a href="#" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">Read more</a>
                <a href="#" target="_blank"  class="btn btn-primary" data-animation="animated fadeInRight">Book Now</a>
            </div>
        </div>
        @endforeach
        <!-- End of Slide -->

        <!-- Second Slide -->
        <div class="item active">            
            <!-- Slide Background -->
            <img src="../img/bg/2.jpg" alt="Slider Images" class="slide-image"/>
            <div class="bs-slider-overlay"></div>
            <!-- Slide Text Layer -->
            <div class="slide-text slide_style_center">
                <h1 data-animation="animated bounceInDown"> Treat<span class="color-defult"> heart</span> disease.</h1>
                <p data-animation="animated lightSpeedIn">consectetur adipisicing elit. Eligendi vel ipsam deleniti dignissimos <br> corporis consequatur possimus eaque voluptates.</p>
                <a href="#" target="_blank" class="btn btn-default" data-animation="animated fadeInUp">Read More</a>
                <a href="#" target="_blank"  class="btn btn-primary" data-animation="animated fadeInDown">Donate Now</a>
            </div>
        </div>
        <!-- End of Slide -->
    </div><!-- End of Wrapper For Slides -->

    <!-- Left Control -->
    <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <!-- Right Control -->
    <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div> <!-- End  bootstrap-touch-slider Slider -->



<!-- welcome start -->
<section>
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-7">
                    <h2>Tại sao chọn chúng tôi</h2>
                    <h3 class="color-defult">Get a world class Health service now</h3>
                    <p class="lead">Medicative Hospital is here for you. Call <span class="ff-p">+00 999 3030</span></p>
                    <p><span class="fw-b">Consectetur</span> adipisicing elit. Ratione ut culpa, illo, odit tempore dignissimos nisi consequatur voluptatem, eveniet quaerat officiis sed ad et fugiat praesentium nesciunt sunt ipsa quam magnam.</p>
                    <div class="row margin-top-20">
                        <div class="col-md-6">
                            <img class="margin-top-10" src="../img/services/s1.jpg" alt="">
                        </div>
                        <div class="col-md-6">
                            <p>Medicative <span class="color-defult fw-b">adipisicing elit</span>. Animi eveniet ipsam, error dolorum impedit debitis, officiis sint saepe similique quasi dolor, ut. Ipsum quaerat saepe, sapiente doloribus ab laudantium ipsam!</p>
                        </div>
                    </div>
                    <div class="clearfix margin-top-20 margin-right-10"> 
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

  </div>
  <div class="col-md-5">
    <div>
     <img alt="" src="../img/services/w1.jpg"> 
 </div>
</div>
</div>
</div>
</div>
</section>
<!-- welcome end -->

<!-- appointment start -->
<section class=" animatedParent animateOnce">
    <div class="container padding-bottom-none">
        <div class="section-content">
            <div class="row">
                <div class="col-md-6">
                    <img class="animated fadeInLeftShort slow delay-500 booking-cantact-img" src="../img/bg/c1.png" alt="">
                </div>
                <div class="col-md-6 bg-f8 padding-tb margin-bottom-80 animated fadeInRightShort slow delay-500">
                    <div class="booking-from">
                        <h2><span class="color-defult">Đặt lịch khám</span></h2>
                        <div class="border-style-2 margin-bottom-30"></div>
                        <p class="margin-bottom-30">Consectetur adipisicing elit. Id dignissimos atque debitis esse possimus, <br>fuga tenetur rem et. Vitae, repudiandae.</p>
                        <form method="post" action="#" id="form_appointment">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                                </div>
                                <div class="col-md-6">
                                    <select name="subject" id="subject" class="form-control action" required="required">
                                        <option value="">Chủ đề</option>
                                        @foreach($specialist as $row)
                                        <option value="{{ $row['id'] }}">{{ $row['name_specialist'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="doctor" id="doctor" class="form-control action" required="required">
                                        <option value="">Chọn bác sĩ</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <select name="calendar" id="calendar" class="form-control">
                                        <option value="">Chọn lịch khám</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email Here" id="email" required data-parsley-type="email" data-parsley-trigger="keyup">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="phone" class="form-control" placeholder="Your Phone" id="phone" required data-parsley-pattern="\d{10}" data-parsley-trigger="keyup">
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-textarea">
                                        <textarea class="form-control" rows="6" placeholder="Wright Message" id="message" name="message" required></textarea>
                                        <button class="btn btn-theme submit" type="submit" value="Submit Form">Send Message</button>
                                    </div>
                                </div>
                                <div id="form-messages"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- appointment end -->

<!-- Counter start -->
<section class="funfact-field over-layer-default" style="background-image: url('img/bg/6.jpg')">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="counter-col text-center">
                    <i class="flaticon-heart"></i>
                    <div class="count">
                        <div class="start-count">25</div>
                        <h4>Heart Transplants</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="counter-col text-center">
                    <i class="flaticon-human-lungs"></i>
                    <div class="count">
                        <div class="start-count">979</div>
                        <h4>BARIATRIC SURGERY</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="counter-col text-center">
                    <i class="flaticon-kidney"></i>
                    <div class="count">
                        <div class="start-count">5264</div>
                        <h4>CRITICAL CARE</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="counter-col text-center">
                    <i class="flaticon-first-aid-kit"></i>
                    <div class="count">
                        <div class="start-count border-none">119</div>
                        <h4>EXTPART Doctor</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counter end -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cảm ơn bạn đã đặt lịch hẹn</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ... Sẽ có quản trị viên gọi điện cho bạn trong ngày . Chúc bạn một ngày tốt lành
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
<script src="jquery.lwMultiSelect.js"></script>
<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script type="text/javascript" src="../js/filterSelectBox.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#form_appointment').parsley();

        //field start validation
        window.Parsley.on('field:validate', function() {
            var field = this.$element[0].id;
            $('#' + field).parent().find('i').remove(); //remove glyph
        });
        window.Parsley.on('field:error', function() {
            var field = this.$element[0].id;
            $('#' + field).parent().append('<i class="fa fa-exclamation-circle fa-lg fa-fw"></i>');
        });

        $('#form_appointment').on('submit', function(e){
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "../home/addAppoinment",
                method: "POST",
                data: form_data,
                success: function(data)
                {
                    $('#form_appointment')[0].reset();
                    $('#form_appointment').parsley().reset();
                    $('#submit').val('Submit');
                }
            });
            setTimeout(() => {
              $('.modal').modal('show');
            }, 50);
        });
    });
</script>
@endsection