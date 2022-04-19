<!--A Design by W3layouts
    Author: W3layout
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->
<!DOCTYPE html>

<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"">
        <link rel=" icon" type="image/x-icon" href="{{ URL::to('/public/frontend/images/download.png') }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
            Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.min.css') }}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('public/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/backend/css/style-responsive.css') }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ URL::asset('/public/backend/css/font.css') }}" type="text/css" />
    <link href="{{ asset('/public/backend/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/backend/css/morris.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/backend/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap-tagsinput.css') }}">
    <!-- calendar -->
    {{-- <link rel="stylesheet" href="{{asset('/public/backend/css/monthly.css')}}"> --}}
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{ asset('public/backend/js/jquery2.0.3.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/raphael-min.js') }}"></script>
    <script src="{{ asset('public/backend/js/morris.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('product_desc');
            CKEDITOR.replace('category_desc');
        });
    </script>
    <script src="https://code.jquery.com/jquery-2.0.3.js" integrity="sha256-lCf+LfUffUxr81+W0ZFpcU0LQyuZ3Bj0F2DQNCxTgSI="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            fetch_delivery();

            function fetch_delivery() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url::to('/select-feeship') }}',
                    method: 'POST',
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        $('#load_delivery').html(data);
                    }
                });
            }
            //
            $(document).on('blur', '.fee_feeship_edit', function() {
                var feeship_id = $(this).data('feeship_id');
                var fee_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url::to('/update-delivery') }}',
                    method: 'POST',
                    data: {
                        feeship_id: feeship_id,
                        fee_value: fee_value,
                        _token: _token
                    },
                    success: function(data) {
                        fetch_delivery();
                    }
                });
            });

            //
            $('.add_delivery').click(function() {
                var city = $('.city').val();
                var province = $('.province').val();
                var wards = $('.wards').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
                // alert(city);
                // alert(province);
                // alert(wards);
                // alert(fee_ship);
                $.ajax({
                    url: '{{ url::to('/insert-delivery') }}',
                    method: 'POST',
                    data: {
                        city: city,
                        province: province,
                        _token: _token,
                        wards: wards,
                        fee_ship: fee_ship
                    },
                    success: function(data) {
                        //    $('#'+result).html(data);
                        fetch_delivery();
                    }
                });
            });
            //
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
                    url: '{{ url::to('/select-delivery') }}',
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
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="index.html" class="logo">
                    VISITORS
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    {{-- Language --}}
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link fa fa-flag form-control" data-toggle="dropdown"
                            style="display: flex;align-items: center;">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-0">
                            <a href="{{ URL::to('language', ['us']) }}" class="dropdown-item active">
                                <i class="flag-icon flag-icon-us mr-2"></i>English
                            </a>
                            <a href="{{ URL::to('language', ['de']) }}" class="dropdown-item">
                                <i class="flag-icon flag-icon-de mr-2"></i>German
                            </a>
                            <a href="{{ URL::to('language', ['fr']) }}" class="dropdown-item">
                                <i class="flag-icon flag-icon-fr mr-2"></i>France
                            </a>
                            <a href="{{ URL::to('language', ['vi']) }}" class="dropdown-item">
                                <i class="flag-icon flag-icon-vi mr-2"></i>VietNam
                            </a>
                        </div>
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ 'public/backend/images/2.png' }}">
                            <span class="username">
                                <?php
                                $name = Session::get('admin_name');
                                if ($name) {
                                    echo $name;
                                }
                                ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="{{ URL::to('/logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{ URL::to('thongke') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>{{ __('Product portfolio') }}</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('add-category') }}">{{ __('Add category') }}</a></li>
                                <li><a href="{{ URL::to('all-category') }}">{{ __('List list') }}</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>{{ __('Banner') }}</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('add-banner') }}">{{ __('Add banner') }}</a></li>
                                <li><a href="{{ URL::to('all-banner') }}">{{ __('List banner') }}</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>{{ __('Slider') }}</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('add-slider') }}">{{ __('Add slider') }}</a></li>
                                <li><a href="{{ URL::to('all-slider') }}">{{ __('List slider') }}</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>{{ __('Donors') }}</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('add-sponsor') }}">{{ __('Add donors') }}</a></li>
                                <li><a href="{{ URL::to('all-sponsor') }}">{{ __('List donors') }}</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>{{ __('Course') }}</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('add-course') }}">{{ __('Add course') }}</a></li>
                                <li><a href="{{ URL::to('all-course') }}">{{ __('List course') }}</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>{{ __('News') }}</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('add-product') }}">{{ __('Add news') }}</a></li>
                                <li><a href="{{ URL::to('all-product') }}">{{ __('List news') }}</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>{{ __('Works') }}</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('add-activity') }}">{{ __('Add works') }}</a></li>
                                <li><a href="{{ URL::to('all-activity') }}">{{ __('List works') }}</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Mã giảm giá</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/coupon') }}">Thêm mã giảm giá</a></li>
                                <li><a href="{{ URL::to('/list-coupon') }}">Quản lý mã giảm giá</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Phí vận chuyển</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/delivery') }}">Quản lý vận chuyển</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Đơn hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('manager-order') }}">Quản lý đơn hàng</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Bình luận</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/list-comment') }}">Liệt kê bình luận</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Khách hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/customer-list') }}">Danh sách khách hàng</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="login.html">
                                <i class="fa fa-user"></i>
                                <span>Login Page</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')
            </section>
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
                </div>
            </div>
            <!-- / footer -->
            <!--main content end-->
        </section>
        <script src="{{ 'public/backend/js/slug.js' }}"></script>
        <script src="{{ 'public/backend/js/bootstrap.js' }}"></script>
        <script src="{{ 'public/backend/js/jquery.dcjqaccordion.2.7.js' }}"></script>
        <script src="{{ 'public/backend/js/scripts.js' }}"></script>
        <script src="{{ 'public/backend/js/jquery.slimscroll.js' }}"></script>
        <script src="{{ 'public/backend/js/jquery.nicescroll.js' }}"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
        <script src="{{ 'public/backend/js/jquery.scrollTo.js' }}"></script>
        <!-- morris JavaScript -->
        <script>
            $(document).ready(function() {
                chart60day();
                var chart = new Morris.Line({
                    element: 'chart',
                    lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3'],
                    hideHover: 'auto',
                    parseTime: false,
                    xkey: 'period',
                    ykeys: ['order', 'sales', 'profit', 'quantity'],
                    labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']
                });

                function chart60day() {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{ url::to('/day-orders') }}',
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            _token: _token
                        },
                        success: function(data) {
                            chart.setData(data);
                        }
                    });
                }
                $('.dashboard-filter').change(function() {
                    var dashboard_value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{ url::to('/dashboard-filter') }}',
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            _token: _token,
                            dashboard_value: dashboard_value
                        },
                        success: function(data) {
                            chart.setData(data);
                        }
                    });
                });
                $('#btn-dashboard-filter').click(function() {
                    var _token = $('input[name="_token"]').val();
                    var from_date = $('#datepicker').val();
                    var to_date = $('#datepicker2').val();
                    $.ajax({
                        url: '{{ url::to('/filter-by-date') }}',
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            _token: _token,
                            from_date: from_date,
                            to_date: to_date
                        },
                        success: function(data) {
                            chart.setData(data);
                        }
                    });
                });
            });
        </script>
        <script src="https://code.jquery.com/jquery-2.0.3.js" integrity="sha256-lCf+LfUffUxr81+W0ZFpcU0LQyuZ3Bj0F2DQNCxTgSI="
                crossorigin="anonymous"></script>
        <script>
            $('.order_details').change(function() {
                var order_status = $(this).val();
                var order_id = $(this).children(":selected").attr("id");
                var _token = $('input[name="_token"]').val();
                // alert(order_status);
                // alert(order_id);
                // alert(_token);
                product_sale_quantity = [];
                $("input[name='product_sale_quantity']").each(function() {
                    product_sale_quantity.push($(this).val());
                });
                order_product_id = [];
                $("input[name='order_product_id']").each(function() {
                    order_product_id.push($(this).val());
                });
                j = 0;
                for (i = 0; i < order_product_id.length; i++) {
                    var order_qty = $('.order_qty_' + order_product_id[i]).val();
                    var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
                    if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                        j = j + 1;
                        if (j == 1) {
                            alert('Số lượng không đủ');
                        }
                        $('.color_qty_' + order_product_id[i]).css('background', '#000')
                    }

                }
                if (j == 0) {
                    $.ajax({
                        url: '{{ url::to('/update-order-qty') }}',
                        method: 'POST',
                        data: {
                            _token: _token,
                            order_status: order_status,
                            order_id: order_id,
                            product_sale_quantity: product_sale_quantity,
                            order_product_id: order_product_id
                        },
                        success: function(data) {
                            alert('Cập nhật số lượng thành công');
                            location.reload();
                        }
                    });
                }

            });
        </script>
        <script>
            $(document).ready(function() {
                load_gallery();

                function load_gallery() {
                    var pro_id = $('.pro_id').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ url::to('/select-gallery') }}",
                        method: "POST",
                        data: {
                            pro_id: pro_id,
                            _token: _token
                        },
                        success: function(data) {
                            $('#gallery_load').html(data);
                        }
                    });
                }
                $('#file').change(function() {
                    var error = '';
                    var files = $('#file')[0].files;
                    if (files.length < 5) {
                        error += '<p>Tối đa chỉ chọn được 5 ảnh</p>';
                    } else if (files.length == '') {
                        error += '<p>Bạn không được bỏ trống ảnh</p>';
                    } else if (files.size > 2000000) {
                        error += '<p>File ảnh không được lớn hơn 2MB</p>';
                    }
                    if (error == '') {
                        $('#file').val('');
                        $('#error_gallery').html('<span class="text-danger">' + error + '</span>');
                        return false;
                    }
                });
                $(document).on('blur', '.edit-gal', function() {
                    var gal_id = $(this).data('gal_id');
                    var gal_text = $(this).text();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ url::to('/update-gallery') }}",
                        method: "POST",
                        data: {
                            gal_id: gal_id,
                            gal_text: gal_text,
                            _token: _token
                        },
                        success: function(data) {
                            load_gallery();
                            $('#error_gallery').html('<span>Cập nhật thành công</span>');
                        }
                    });
                });
                $(document).on('click', '.delete-gallery', function() {
                    var gal_id = $(this).data('gal_id');
                    var _token = $('input[name="_token"]').val();
                    if (confirm('Bạn có muốn xóa ?')) {
                        $.ajax({
                            url: "{{ url::to('/delete-gallery') }}",
                            method: "POST",
                            data: {
                                gal_id: gal_id,
                                _token: _token
                            },
                            success: function(data) {
                                load_gallery();
                                $('#error_gallery').html('<span>Xóa thành công</span>');
                            }
                        });
                    }
                });
                //Edit gallery
                $(document).on('change', '.file_image', function() {
                    var gal_id = $(this).data('gal_id');
                    var image = document.getElementById('file-' + gal_id).files[0];
                    var form_data = new FormData();

                    form_data.append("file", document.getElementById('file-' + gal_id).files[0]);
                    form_data.append("gal_id", gal_id);
                    $.ajax({
                        url: "{{ url::to('/update-gallery-image') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            load_gallery();
                            $('#error_gallery').html('<span>Cập nhật thành công</span>');
                        }
                    });
                });

            });
        </script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
                $('#myTable-1').DataTable();
                $('#myTable-2').DataTable();
            });
        </script>

        <script>
            // $('.comment_duyet_btn').click(function(){
            //     var comment_status = $(this).data('comment_status');
            //     var comment_id = $(this).data('comment_id');
            //     var comment_product_id = $(this).attr('id');
            //     if(comment_status == 0){
            //         var alert = "Thay đổi thành công";
            //     }else{
            //         var alert = "Thay đổi thất bại";
            //     }
            //     $.ajax({
            //         url:    "{{ url::to('/allow-comment') }}",
            //         method: "POST",
            //         headers:{
            //             'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            //         },
            //         data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
            //         success:function(data){
            //                     $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');
            //                     $('#notify_comment').fadeOut(2000);
            //                 }
            //         });
            // });
            //
            $('.btn-reply-comment').click(function() {
                var comment_id = $(this).data('comment_id');
                var comment = $('.reply_comment_' + comment_id).val();
                var comment_product_id = $(this).data('product_id');
                $.ajax({
                    url: "{{ url::to('/reply-comment') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        comment: comment,
                        comment_id: comment_id,
                        comment_product_id: comment_product_id
                    },
                    success: function(data) {
                        $('.reply_comment_' + comment_id).val('');
                        $('#notify_comment').html('<span class="text text-alert">Đã trả lời</span>');
                        $('#notify_comment').fadeOut(2000);
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {

                var colorDanger = "#FF1744";
                Morris.Donut({
                    element: 'donut',
                    resize: true,
                    colors: [
                        '#E0F7FA',
                        '#B2EBF2',
                        '#80DEEA',
                        '#4DD0E1',
                        '#26C6DA',
                        '#00BCD4',
                        '#00ACC1',
                        '#0097A7',
                        '#00838F',
                        '#006064'
                    ],
                    data: [{
                            label: "Sản phẩm",
                            value: <?php echo $product; ?>,
                            color: colorDanger
                        },
                        // {
                        //     label: "Bài viết",
                        //     value: <?php echo $product; ?>
                        // },
                        {
                            label: "Đơn hàng",
                            value: <?php echo $app_order; ?>
                        },
                        {
                            label: "Khách hàng",
                            value: <?php echo $app_customer; ?>
                        }
                    ]
                });

            });
        </script>

        // {{-- <script>
        //     $( function() {
        //       $( "#datepicker" ).datepicker();
        //       $( "#datepicker2" ).datepicker();
        //     } );
        // </script> --}}
        <script src="{{ asset('public/backend/js/datatables.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/bootstrap-tagsinput.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
</body>

</html>
