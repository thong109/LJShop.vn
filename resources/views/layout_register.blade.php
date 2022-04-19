
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="M_Adnan">
        <title>Hanul Teakwondo</title>
        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/rs-plugin/css/settings.css')}}" media="screen" />
        <!-- Bootstrap Core CSS -->
        <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/path/css/font-awesome.min.css')}}">
        <script>document.getElementsByTagName("html")[0].className += " js";</script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{asset('public/frontend/css/ionicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/chitietsanpham.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/styles.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/slider.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/carousel.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/back-top-top.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('public/frontend/css/sweet-alert.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/frontend/js/sweet-alert.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/frontend/js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/frontend/js/util.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/frontend/js/second.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/frontend/js/slider.js')}}"></script>
        <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
        <!-- JavaScripts -->
        <script src="{{asset('public/frontend/js/modernizr.js')}}"></script>
        <!-- Online Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <!-- LOADER -->
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=242022341197786&autoLogAppEvents=1" nonce="z0aa89us"></script>
        <!-- header -->
        <header>
            <div class="sticky">
                <div class="container">
                    <!-- Logo -->
                    <div class="logo"> <a class="logo-1" href="{{URL::to('/trang-chu')}}">Hanul teakwondo</a> </div>
                    <nav class="navbar ownmenu">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar" style="color: #fff;"><i class="fa fa-navicon"></i></span> </button>
                        </div>
                        <!-- NAV -->
                        <div class="collapse navbar-collapse" id="nav-open-btn">
                            <ul class="nav">
                                <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a> </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        @yield('content_register')
        {{-- <a href="#" class="cd-top text-replace js-cd-top">Top</a> --}}
        <div class="hotline-phone-ring-wrap">
                    <div class="hotline-phone-ring">
                        <div class="hotline-phone-ring-circle"></div>
                        <div class="hotline-phone-ring-circle-fill"></div>
                        <div class="hotline-phone-ring-img-circle">
                            <a href="tel:0123456789" class="pps-btn-img">
                            <img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="Gọi điện thoại" width="50">
                            </a>
                        </div>
                    </div>
                    <div class="hotline-bar">
                        <a href="tel:0123456789">
                        <!-- <span class="text-hotline">012.345.6789</span> -->
                        </a>
                    </div>
                </div>
                <div class="back-to-top-wrap cd-top text-replace js-cd-top">
                                    <div class="back-to-top">
                                        <div class="back-to-top-img-circle">
                                        <a href="#">Top</a>
                                        </div>
                                    </div>
                                    <div class="hotline-bar">
                                        <a href="#">
                                        <!-- <span class="text-hotline">012.345.6789</span> -->
                                        </a>
                                    </div>
                </div>

         <!--======= FOOTER =========-->
          <footer>
            <div class="container">

              <!-- ABOUT Location -->
              <div class="col-md-3">
                <div class="about-footer"> <img class="margin-bottom-30" src="images/1.png" alt="" >
                  <p><i class="icon-pointer"></i>08 Nguyễn Chánh, Đà Nẵng</p>
                  <p><i class="icon-call-end"></i> 1.800.123.456789</p>
                  <p><i class="icon-envelope"></i> info@ecoshop.com</p>
                </div>
              </div>

              <!-- HELPFUL LINKS -->
              <div class="col-md-3">
                <h6>HELPFUL LINKS</h6>
                <ul class="link">
                  <li><a href="#."> Products</a></li>
                  <li><a href="#."> Find a Store</a></li>
                  <li><a href="#."> Features</a></li>
                  <li><a href="#."> Privacy Policy</a></li>
                  <li><a href="#."> Blog</a></li>
                  <li><a href="#."> Press Kit </a></li>
                </ul>
              </div>

              <!-- SHOP -->
              <div class="col-md-3">
                <h6>SHOP</h6>
                <ul class="link">
                  <li><a href="#."> About Us</a></li>
                  <li><a href="#."> Career</a></li>
                  <li><a href="#."> Shipping Methods</a></li>
                  <li><a href="#."> Contact</a></li>
                  <li><a href="#."> Support</a></li>
                  <li><a href="#."> Retailer</a></li>
                </ul>
              </div>

              <!-- MY ACCOUNT -->
              <div class="col-md-3" style="color: white;">
               TAEKWONDO
              </div>

              <!-- Rights -->

              <div class="rights">
                <p>©  2016 ecoshop All right reserved. </p>

              </div>
            </div>
          </footer>

          <!--======= RIGHTS =========-->

        </div>
        <script src="{{asset('public/frontend/js/jquery-1.11.3.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/own-menu.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.lighter.js')}}"></script>
        <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/slider.js')}}"></script>

        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="{{asset('public/frontend/rs-plugin/js/jquery.tp.t.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/frontend/rs-plugin/js/jquery.tp.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/main.js')}}"></script>
        <script src="{{asset('public/frontend/js/main.js')}}"></script>
        </body>
        </html>
