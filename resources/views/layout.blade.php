<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Seo --}}
    <link rel="canonical" href="{{ $url_canonical }}" />
    <meta name="keywords" content="{{ $meta_keywords }}" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="description" content="{{ $meta_desc }}">
    <meta charset="utf-8">
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="M_Adnan">
    <meta property="og:site_name" content="http://localhost/camera">
    <meta property="og:description" content="{{ $meta_desc }}">
    <meta property="og:title" content="{{ $meta_title }}">
    <meta property="og:url" content="{{ $url_canonical }}">
    <meta property="og:type" content="website">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- End seo --}}
    <title>{{ $meta_title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ URL::to('/public/frontend/images/download.png') }}">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/rs-plugin/css/settings.css') }}"
        media="screen" />
    {{--  --}}
    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/path/css/font-awesome.min.css') }}">
    <link href="{{ asset('public/frontend/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/icon/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/frontend/js/sweet-alert.min.js') }}"></script>
    <!-- JavaScripts -->
    <script src="{{ asset('public/frontend/js/modernizr.js') }}"></script>
    <!-- Online Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
    <link href="{{ asset('public/frontend/lightgallery.min.css/') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/lightslider.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/prettify.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "102191541727483");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v13.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>

<body>
    <!-- LOADER -->
    <div id="loader">
        <div class="position-center-center">
            <div class="ldr"></div>
        </div>
    </div>
    <!-- header -->
    <header>
        <div class="sticky">
            <div class="container">
                <!-- Logo -->
                <nav class="navbar ownmenu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle
                                navigation</span> <span class="icon-bar"><i class="fa fa-navicon"></i></span>
                        </button>
                    </div>
                    <!-- NAV -->
                    <div class="collapse navbar-collapse" id="nav-open-btn">
                        <ul class="nav">
                            <li><a href="{{ URL::to('/trang-chu') }}">{{ __('Home') }}</a> </li>
                            <li class="dropdown">
                                <a href="#." class="dropdown-toggle" data-toggle="dropdown">{{ __('Brand') }}</a>
                                <ul class="dropdown-menu">
                                    @foreach ($category as $key => $cate)
                                        <li>
                                            <a
                                                href="{{ URL::to('product-by-category', [$cate->category_id]) }}">{{ $cate->category_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ URL::to('/activity') }}">{{ __('News') }}</a> </li>
                            <li class="dropdown">
                                <a href="#." class="dropdown-toggle" data-toggle="dropdown">{{ __('Language') }}</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('language', ['us']) }}">
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('language', ['de']) }}">
                                            German
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('language', ['fr']) }}">
                                            France
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('language', ['vi']) }}">
                                            VietNam
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Nav Right -->
                    <div class="nav-right">
                        <ul class="navbar-right">
                            <!-- USER INFO -->
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button"><i class="pegk pe-7s-user"></i> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('/gio-hang') }}">Giỏ hàng</a></li>
                                    {{-- <li><a href="#">ACCOUNT INFO</a></li> --}}
                                    <?php
                                 $customer_id = Session::get('customer_id');
                                 $shipping_id = Session::get('shipping_id');
                                 if ($customer_id!=NULL && $shipping_id==NULL) {
                                   ?>
                                    <li><a href="{{ URL::to('/checkout') }}">Thanh toán</a></li>
                                    <?php
                                 }elseif ($customer_id!=NULL && $shipping_id!=NULL) {
                                 ?>
                                    <li><a href="{{ URL::to('/payment') }}">Thanh toán</a></li>
                                    <?php
                                 }else {
                                     ?>
                                    {{-- <li><a href="{{URL::to('/login-checkout')}}">Đăng nhập</a></li> --}}
                                    <?php
                                 }
                                 ?>
                                    <?php
                                 $customer_id = Session::get('customer_id');
                                 if ($customer_id!=NULL) {
                                   ?>
                                    <li><a href="{{ URL::to('/logout-checkout') }}">Đăng xuất</a></li>
                                    <?php
                                 }else {
                                         ?>
                                    <li><a href="{{ URL::to('/login-checkout') }}">Đăng nhập</a></li>
                                    <?php
                                 }
                                 ?>
                                    <li>
                                </ul>
                            </li>
                            <!-- USER BASKET -->
                            <li class="dropdown user-basket">
                                <a href="#." data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="true"><i class="pegk pe-7s-like"></i></a>
                                <ul id="row_wistlist" class="dropdown-menu" style="overflow-y:scroll;height:300px ">

                                </ul>
                            </li>
                            <!-- SEARCH BAR -->
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="search-open"><i
                                        class="pegk pe-7s-search"></i></a>
                                <div class="search-inside animated bounceInUp">
                                    <i class="pegk pe-7s-close search-close"></i>
                                    <div class="search-overlay"></div>
                                    <div class="position-center-center">
                                        <div class="search">
                                            <form action="{{ URL::to('/timkiem') }}" method="GET" autocomplete="off">
                                                <input type="text" name="keyword" placeholder="Tìm kiếm" id="keyword">
                                                <div id="search_ajax"></div>
                                                <button type="submit"><i class="pegk pe-7s-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    @yield('content')
    <!--======= FOOTER =========-->
    {{-- <footer>
         <div class="container">
            <!-- ABOUT Location -->
            <div class="col-md-3">
               <div class="about-footer">
                  <img class="margin-bottom-30" src="images/logo-foot.png" alt="" >
                  <p><i class="icon-pointer"></i> Street No. 12, Newyork 12, <br>
                     MD - 123, USA.
                  </p>
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
            <div class="col-md-3">
               <h6>MY ACCOUNT</h6>
               <ul class="link">
                  <li><a href="#."> Login</a></li>
                  <li><a href="#."> My Account</a></li>
                  <li><a href="#."> My Cart</a></li>
                  <li><a href="#."> Wishlist</a></li>
                  <li><a href="#."> Checkout</a></li>
               </ul>
            </div>
            <!-- Rights -->
            <div class="rights">
               <p>©  2016 ecoshop All right reserved. </p>
               <div class="scroll"> <a href="#wrap" class="go-up"><i class="lnr lnr-arrow-up"></i></a> </div>
            </div>
         </div>
      </footer> --}}
    <!--======= RIGHTS =========-->
    </div>
    <script src="{{ asset('public/frontend/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/own-menu.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.lighter.js') }}"></script>
    <script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="{{ asset('public/frontend/rs-plugin/js/jquery.tp.t.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/frontend/rs-plugin/js/jquery.tp.min.js') }}"></script>
    {{--  --}}
    {{-- <script src="{{asset('public/frontend/js/main.js')}}"></script>
      <script src="{{asset('public/frontend/js/jquery-1.11.3.min.js')}}"></script>
      <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('public/frontend/js/own-menu.js')}}"></script>
      <script src="{{asset('public/frontend/js/jquery.lighter.js')}}"></script>
      <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script> --}}
    <script src="{{ asset('public/frontend/js/sweet-alert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_sale_after = $('.cart_product_sale_after_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name= "_token"]').val();
                if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                    alert('Làm ơn đặt nhỏ hơn' + cart_product_quantity);
                } else {
                    $.ajax({
                        url: '{{ url::to('/add-cart-ajax') }}',
                        method: 'POST',
                        data: {
                            cart_product_id: cart_product_id,
                            cart_product_name: cart_product_name,
                            cart_product_quantity: cart_product_quantity,
                            cart_product_image: cart_product_image,
                            cart_product_sale_after: cart_product_sale_after,
                            cart_product_qty: cart_product_qty,
                            _token: _token
                        },
                        success: function() {
                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{ url('/gio-hang') }}";
                                });
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            load_comment();

            function load_comment() {
                var product_id = $('.comment_product_id').val();
                var _token = $('input[name= "_token"]').val();
                $.ajax({
                    url: '{{ url::to('/load-comment') }}',
                    method: 'POST',
                    data: {
                        product_id: product_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#show_comment').html(data);
                    }
                });
            }
            $('.send-comment').click(function() {
                var product_id = $('.comment_product_id').val();
                var comment_name = $('.comment_name').val();
                var comment_content = $('.comment_content').val();
                var _token = $('input[name= "_token"]').val();
                $.ajax({
                    url: '{{ url::to('/send-comment') }}',
                    method: 'POST',
                    data: {
                        product_id: product_id,
                        comment_name: comment_name,
                        comment_content: comment_content,
                        _token: _token
                    },
                    success: function(data) {
                        var comment_name = $('.comment_name').val('');
                        var comment_content = $('.comment_content').val('');
                        $('#notify_comment').html(
                            '<p class="text text-success">Thêm bình luận thành công</p>');
                        load_comment();
                        $('#notify_comment').fadeOut(2000);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{ url::to('/select-delivery-home') }}',
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.caculate_delivery').click(function() {
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if (matp == '' && maqh == '' && xaid == '') {
                    alert('Bạn chưa chọn địa chỉ');
                } else {
                    $.ajax({
                        url: '{{ url::to('/caculate-fee') }}',
                        method: 'POST',
                        data: {
                            matp: matp,
                            maqh: maqh,
                            _token: _token,
                            xaid: xaid
                        },
                        success: function() {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
    {{--  --}}
    <script>
        $('.xemnhanh').click(function() {
            var product_id = $(this).data('id_product');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url::to('/quickview') }}',
                method: 'POST',
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
                    $('#product_quickview_title').html(data.product_name);
                    $('#product_quickview_id').html(data.product_id);
                    $('#product_quickview_price').html(data.product_price);
                    $('#product_quickview_tags').html(data.product_tags);
                    $('#product_quickview_image').html(data.product_image);
                    $('#product_quickview_gallery').html(data.product_gallery);
                    $('#product_quickview_desc').html(data.product_desc);
                    $('#product_quickview_content').html(data.product_content);
                    $('#product_quickview_value').html(data.product_quickview_value);
                    $('#product_quickview_button').html(data.product_button);
                }
            });
        });
    </script>
    {{--  --}}
    <script>
        $(document).ready(function() {
            $('.send_order').click(function() {
                swal({
                        title: "Xác nhận đơn hàng",
                        text: "Đơn hàng khi mua sẽ không được hoàn trả, bạn có chắc ???",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        buttons: true,
                        dangerMode: true,
                    },
                    function(willDelete) {
                        if (willDelete) {
                            var shipping_email = $('.shipping_email').val();
                            var shipping_name = $('.shipping_name').val();
                            var shipping_address = $('.shipping_address').val();
                            var shipping_phone = $('.shipping_phone').val();
                            var shipping_notes = $('.shipping_notes').val();
                            var shipping_method = $('.payment_select').val();
                            var order_fee = $('.order_fee').val();
                            var order_coupon = $('.order_coupon').val();
                            var _token = $('input[name= "_token"]').val();
                            $.ajax({
                                url: '{{ url::to('/confirm-order') }}',
                                method: 'POST',
                                data: {
                                    shipping_email: shipping_email,
                                    shipping_name: shipping_name,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_notes: shipping_notes,
                                    order_fee: order_fee,
                                    order_coupon: order_coupon,
                                    _token: _token,
                                    shipping_method: shipping_method
                                },
                                success: function() {
                                    swal(
                                        "Đơn hàng đã được gửi, chúng tôi sẽ gửi cho bạn một email để theo dõi đơn hàng");
                                }
                            });
                            window.setTimeout(function() {
                                location.reload();
                            }, 3000);
                        }
                    });
            });
        });
    </script>
    {{-- Add-to-cart-quickview --}}
    <script>
        $(document).on('click', '.add-to-cart-quickview', function() {
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name= "_token"]').val();
            if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                alert('Làm ơn đặt nhỏ hơn' + cart_product_quantity);
            } else {
                $.ajax({
                    url: '{{ url::to('/add-cart-ajax') }}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_quantity: cart_product_quantity,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    beforeSend: function() {
                        $('#beforesned_quickview').html("Đang thêm sản phẩm vào giỏ ....");
                    },
                    success: function() {
                        $('#beforesned_quickview').html("Đã thêm sản phẩm vào giỏ !!!");
                    }
                });
            }
        });
    </script>
    <script type="text/javascript" src="{{ asset('public/frontend/js/jquery.lighter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/frontend/js/lightslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/frontend/js/prettify.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#imageGallery').lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                thumbItem: 5,
                slideMargin: 0,
                enableDrag: false,
                currentPagerPosition: 'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
        });
    </script>
    <script>
        $('#keyword').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url::to('/autocomplete-ajax') }}',
                    method: 'POST',
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            } else {
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click', '.li_search_ajax', function() {
            $('#keyword').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    {{-- danh gia sao --}}
    <script>
        function remove_background(product_id) {
            for (var count = 1; count <= 5; count++) {
                $('#' + product_id + '-' + count).css('color', '#ccc');
            }
        }
        // hover chuot danh gia
        $(document).on('mouseenter', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data("product_id");
            remove_background(product_id);
            for (var count = 1; count <= index; count++) {
                $('#' + product_id + '-' + count).css('color', '#ffcc00');
            }
        });
        // Nha chuot ko danh gia
        $(document).on('mouseleave', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data("product_id");
            var rating = $(this).data("rating");
            remove_background(product_id);
            for (var count = 1; count <= rating; count++) {
                $('#' + product_id + '-' + count).css('color', '#ffcc00');
            }
        });
        //click danh gia sao
        $(document).on('click', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data("product_id");
            var _token = $('input[name= "_token"]').val();
            $.ajax({
                url: '{{ url::to('/insert-rating') }}',
                method: 'POST',
                data: {
                    index: index,
                    _token: _token,
                    product_id: product_id
                },
                success: function(data) {
                    if (data == 'done') {
                        alert('Bạn đã đánh giá' + ' ' + index + ' ' + 'trên 5');
                        location.reload();
                    } else {
                        alert('Lỗi đánh giá');
                    }
                }
            });
        });
    </script>
    <script>
        function view() {
            if (localStorage / getItem('data') != null) {
                var data = JSON.parse(localStorage.getItem('data'));
                data.reverse();
                //   document.getElementById('row_wistlist').style.overflow = 'scroll';
                //   document.getElementById('row_wistlist').style.height = '300px';
                for (i = 0; i < data.length; i++) {
                    var name = data[i].name;
                    var price = data[i].price;
                    var image = data[i].image;
                    var url = data[i].url;
                    $('#row_wistlist').append('<li><div class="media-left"><div class="cart-img"> <a href="' + url +
                        '"> <img class="media-object img-responsive" src="' + image +
                        '" alt="..."> </a> </div></div><div class="media-body"><h6 class="media-heading">' + name +
                        '</h6><span class="price">' + price + '</span><span class="price"><a href="' + url +
                        '">Xem</a></span><span class="price"><a href="#." class="btn-violet add home mt-3 delete_withlist">Xóa</a></span></div></li>'
                        );
                }
            }
        }
        view();

        function add_wistlist(clicked_id) {
            var id = clicked_id;
            var name = document.getElementById('wistlist_productname' + id).value;
            var price = document.getElementById('wistlist_productprice' + id).value;
            var image = document.getElementById('wistlist_productimage' + id).src;
            var url = document.getElementById('wistlist_producturl' + id).href;
            var newItem = {
                'url': url,
                'id': id,
                'name': name,
                'price': price,
                'image': image
            }
            if (localStorage.getItem('data') == null) {
                localStorage.setItem('data', '[]');
            }
            var old_data = JSON.parse(localStorage.getItem('data'));
            var matches = $.grep(old_data, function(obj) {
                return obj.id == id;
            })
            if (matches.length) {
                alert('Sản phẩm đã có trong danh sách yêu thích');
            } else {
                old_data.push(newItem);
                $('#row_wistlist').append('<li><div class="media-left"><div class="cart-img"> <a href="' + newItem.url +
                    '"> <img class="media-object img-responsive" src="' + newItem.image +
                    '" alt="..."> </a> </div></div><div class="media-body"><h6 class="media-heading">' + newItem.name +
                    '</h6><span class="price">' + newItem.price + ' VND</span><span class="price"><a href="' + newItem
                    .url +
                    '" class="btn-violet add home mt-3">Xem</a></span><span class="price"><a href="#." class="btn-violet add home mt-3 delete_withlist">Xóa</a></span></div></li>'
                    );
            }
            localStorage.setItem('data', JSON.stringify(old_data));
        }
        $(document).on('click', '.delete_withlist', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            if (result) {
                for (var i = 0; i < result.length; i++) {
                    if (result[i].id == id) {
                        result.splice(i, i);
                        break;
                    }
                }
                localStorage.setItem('data', JSON.stringify(result));
                swal({
                    title: 'Sản phẩm đã được xóa khỏi danh mục yêu thích!!!',
                    icon: "success",
                    button: "Quay lại",
                }).then(ok => {
                    window.location.reload();
                });

            }
            if (result.length == 1) {
                for (var i = 0; i < result.length; i++) {
                    if (result[i].id == id) {
                        result.splice(i, 1);
                        break;
                    }
                }
                localStorage.setItem('data', JSON.stringify(result));
                swal({
                    title: 'Sản phẩm đã được xóa khỏi danh mục yêu thích!!!',
                    icon: "success",
                    button: "Quay lại",
                }).then(ok => {
                    window.location.reload();
                });
            }
        });
    </script>
    <script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="{{ asset('public/frontend/rs-plugin/js/jquery.tp.t.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/frontend/rs-plugin/js/jquery.tp.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "102191541727483");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v13.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>
