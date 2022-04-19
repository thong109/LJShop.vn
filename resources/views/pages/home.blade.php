@extends('layout')
@section('content')
<!-- Wrap -->
<div id="wrap">
    <!--======= HOME MAIN SLIDER =========-->
    <section class="home-slider">

      <!-- SLIDE Start -->
      <div class="tp-banner-container">
        <div class="tp-banner">
          <ul>
            <!-- SLIDE  -->
            @foreach ($all_banner as $key => $banner)
            <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
                <!-- MAIN IMAGE -->
                <img src="{{URL::to('public/uploads/product/'.$banner->banner_image)}}"  alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                <!-- LAYER NR. 2 -->
                <div class="tp-caption sfr font-extra-bold tp-resizeme"
                    data-x="left" data-hoffset="0"
                    data-y="center" data-voffset="0"
                    data-speed="800"
                    data-start="800"
                    data-easing="Power3.easeInOut"
                    data-splitin="chars"
                    data-splitout="none"
                    data-elementdelay="0.07"
                    data-endelementdelay="0.1"
                    data-endspeed="300"
                    style="z-index: 6; font-size:120px; color:#fff; text-transform:uppercase; white-space: nowrap;">{{$banner->banner_desc}}</div>
                <!-- LAYER NR. 2 -->
                <div class="tp-caption sfr font-extra-bold tp-resizeme"
                    data-x="left" data-hoffset="0"
                    data-y="center" data-voffset="110"
                    data-speed="800"
                    data-start="1300"
                    data-easing="Power3.easeInOut"
                    data-splitin="chars"
                    data-splitout="none"
                    data-elementdelay="0.07"
                    data-endelementdelay="0.1"
                    data-endspeed="300"
                    style="z-index: 6; font-size:120px; color:#fff; text-transform:uppercase; white-space: nowrap;">{{$banner->banner_content}} </div>
                <!-- LAYER NR. 4 -->
                <div class="tp-caption lfb tp-resizeme"
                    data-x="left" data-hoffset="0"
                    data-y="center" data-voffset="240"
                    data-speed="800"
                    data-start="2200"
                    data-easing="Power3.easeInOut"
                    data-elementdelay="0.1"
                    data-endelementdelay="0.1"
                    data-endspeed="300"
                    data-scrolloffset="0"
                    style="z-index: 8;"><a href="#news" class="btn">SHOP NOW</a> </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </section>

    <!-- Content -->
    <div id="content">

      <!-- New Arrival -->
      <section class="padding-top-100 padding-bottom-100">
        <div class="container">

          <!-- Main Heading -->
          <div class="heading text-center" id="news">
            <h4>new arrival</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
            Sed feugiat, tellus vel tristique posuere, diam</span> </div>
        </div>

        <!-- New Arrival -->
        <div class="arrival-block">

          <!-- Item -->
          <div class="item">
            <!-- Images -->
            <img class="img-1" src="images/item-img-1-1.jpg" alt=""> <img class="img-2" src="images/item-img-1-1-1.jpg" alt="">
            <!-- Overlay  -->
            <div class="overlay">
              <!-- Price -->
              <span class="price"><small>$</small>299</span>
              <div class="position-center-center"> <a href="images/item-img-1-1.jpg" data-lighter><i class="icon-magnifier"></i></a> </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">wooden chair</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <!-- Item -->
          <div class="item">
            <!-- Images -->
            <img class="img-1" src="images/item-img-1-2.jpg" alt=""> <img class="img-2" src="images/item-img-1-1-1.jpg" alt="">
            <!-- Overlay  -->
            <div class="overlay">
              <!-- Price -->
              <span class="price"><small>$</small>299</span>
              <div class="position-center-center"> <a href="images/item-img-1-2.jpg" data-lighter><i class="icon-magnifier"></i></a> </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">MINIMALIST WOO TOYS</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <!-- Item -->
          <div class="item">
            <!-- Images -->
            <img class="img-1" src="images/item-img-1-3.jpg" alt=""> <img class="img-2" src="images/item-img-1-1-1.jpg" alt="">
            <!-- Overlay  -->
            <div class="overlay">
              <!-- Price -->
              <span class="price"><small>$</small>299</span>
              <div class="position-center-center"> <a href="images/item-img-1-3.jpg" data-lighter><i class="icon-magnifier"></i></a> </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">Concrete Shaving Kit</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <!-- Item -->
          <div class="item">
            <!-- Images -->
            <img class="img-1" src="images/item-img-1-4.jpg" alt=""> <img class="img-2" src="images/item-img-1-1-1.jpg" alt="">
            <!-- Overlay  -->
            <div class="overlay">
              <!-- Price -->
              <span class="price"><small>$</small>299</span>
              <div class="position-center-center"> <a href="images/item-img-1-4.jpg" data-lighter><i class="icon-magnifier"></i></a> </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">PARAGON PENDANT</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <!-- Item -->
          <div class="item">
            <!-- Images -->
            <img class="img-1" src="images/item-img-1-5.jpg" alt=""> <img class="img-2" src="images/item-img-1-1-1.jpg" alt="">
            <!-- Overlay  -->
            <div class="overlay">
              <!-- Price -->
              <span class="price"><small>$</small>299</span>
              <div class="position-center-center"> <a href="images/item-img-1-5.jpg" data-lighter><i class="icon-magnifier"></i></a> </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">crative lamp</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <!-- Item -->
          <div class="item">
            <!-- Images -->
            <img class="img-1" src="images/item-img-1-6.jpg" alt=""> <img class="img-2" src="images/item-img-1-1-1.jpg" alt="">
            <!-- Overlay  -->
            <div class="overlay">
              <!-- Price -->
              <span class="price"><small>$</small>299</span>
              <div class="position-center-center"> <a href="images/item-img-1-6.jpg" data-lighter><i class="icon-magnifier"></i></a> </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">ECO FRIENDLY</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <!-- Item -->
          <div class="item">
            <!-- Images -->
            <img class="img-1" src="images/item-img-1-7.jpg" alt=""> <img class="img-2" src="images/item-img-1-1-1.jpg" alt="">
            <!-- Overlay  -->
            <div class="overlay">
              <!-- Price -->
              <span class="price"><small>$</small>299</span>
              <div class="position-center-center"> <a href="images/item-img-1-7.jpg" data-lighter><i class="icon-magnifier"></i></a> </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">GEOMETRY STOOL</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
          </div>

          <!-- Item -->
          <div class="item">
            <!-- Images -->
            <img class="img-1" src="images/item-img-1-8.jpg" alt=""> <img class="img-2" src="images/item-img-1-1-1.jpg" alt="">
            <!-- Overlay  -->
            <div class="overlay">
              <!-- Price -->
              <span class="price"><small>$</small>299</span>
              <div class="position-center-center"> <a href="images/item-img-1-8.jpg" data-lighter><i class="icon-magnifier"></i></a> </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="#.">CERAMIC STONE VASE</a>
              <p>Lorem ipsum dolor sit amet</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Popular Products -->
      <section class="padding-top-50 padding-bottom-50">
        <div class="container">

          <!-- Main Heading -->
          <div class="heading text-center">
            <h4>popular products</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
            Sed feugiat, tellus vel tristique posuere, diam</span> </div>

          <!-- Popular Item Slide -->
          <div class="papular-block block-slide">
            <!-- Item -->
            @foreach ($all_product as $key => $product)
            <div class="item">
                <!-- Item img -->
                <div class="item-img">
                        <img id="wistlist_productimage{{$product->product_id}}" class="img-1" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" >
                        <img class="img-2" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" >
                  <!-- Overlay -->
                  <div class="overlay">
                    <div class="position-center-center">
                      <div class="inn">
                          {{-- <a href="{{URL::to('public/uploads/product/'.$product->product_image)}}" data-lighter><i class="icon-magnifier"></i></a> --}}
                          <a type="button" class="add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart" title="Thêm vào giỏ hàng" data-toggle="tooltip" data-placement="top"><i class="pegk pe-7s-cart"></i></a>
                          <a type="button" data-toggle="modal" data-target="#xemnhanh" class=" xemnhanh" data-id_product="{{$product->product_id}}" title="Xem nhanh" data-placement="top"><i class="pegk pe-7s-search"></i></a>
                          <a href="#." data-toggle="tooltip" id="{{$product->product_id}}" onclick="add_wistlist(this.id);" data-placement="top" title="Thêm vào danh sách yêu thích"><i class="pegk pe-7s-like"></i></a>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Item Name -->
                <div class="item-name" data-toggle="tooltip" data-placement="top" title="Chi tiết {{$product->product_name}}">
                <a id="wistlist_producturl{{$product->product_id}}" href="{{URL::to('chi-tiet-san-pham/'.$product->product_slug)}}">{{$product->product_name}}</a>
                  <p>{{$product->product_content}}</p>
                  <input type="hidden" name="productid_hidden" value="{{$product->product_id}}">
                        <form action="">
                            @csrf
                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                            <input type="hidden" id="wistlist_productname{{$product->product_id}}" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                            @php
                            $product->product_sale_after  =  $product->product_price - ( $product->product_price*$product->product_sale)/100;
                            @endphp
                            <input type="hidden" id="wistlist_productprice{{$product->product_id}}" value="{{$product->product_sale_after}}" class="cart_product_sale_after_{{$product->product_id}}">
                            <input type="hidden" class="cart_product_qty_{{$product->product_id}}"  name="cart_product_quantity" min="1" oninput="validity.valid||(value='');" value="1">
                            <input type="hidden" name="productid_hidden" value="{{$product->product_id}}">
                        </form>
                </div>
                <!-- Price -->
                <span class="price">
                        @if($product->product_sale)
                                <span class="price">
                                    <div class="ml-3 d-flex">
                                        <span>{{number_format($product->product_sale_after)}}</span><div class="m-0-5"> VND</div>
                                    </div>
                                    <strike class="m-0-5 d-flex mausay">{{number_format($product->product_price)}}<div> VND</div></strike>

                                </span>
                        @else
                                <span class="price">{{number_format($product->product_price)}} <div class="m-0-5">VND</div></span>
                                @endif
                </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- Popular Products -->
      <section class="padding-top-50 padding-bottom-50">
        <div class="container">

          <!-- Main Heading -->
          <div class="heading text-center">
            <h4>Sản phẩm giảm giá</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
            Sed feugiat, tellus vel tristique posuere, diam</span> </div>

          <!-- Popular Item Slide -->
          <div class="papular-block block-slide">
            <!-- Item -->
            @foreach ($all_product_sale as $key => $product)
            <div class="item">
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" ><img class="img-2" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" >
                  <!-- Overlay -->
                  <div class="overlay">
                    <div class="position-center-center">
                      <div class="inn">
                          {{-- <a href="{{URL::to('public/uploads/product/'.$product->product_image)}}" data-lighter><i class="icon-magnifier"></i></a> --}}
                          <a type="button" class="add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart" title="Thêm vào giỏ hàng" data-toggle="tooltip" data-placement="top"><i class="pegk pe-7s-cart"></i></a>
                          <a type="button" data-toggle="modal" data-target="#xemnhanh" class=" xemnhanh" data-id_product="{{$product->product_id}}" title="Xem nhanh" data-placement="top"><i class="pegk pe-7s-search"></i></a>
                          <a href="#." data-toggle="tooltip" id="{{$product->product_id}}" onclick="add_wistlist(this.id);" data-placement="top" title="Thêm vào danh sách yêu thích"><i class="pegk pe-7s-like"></i></a>
                        </div>
                    </div>
                  </div>
                </div>

                <!-- Item Name -->
                <div class="item-name" data-toggle="tooltip" data-placement="top" title="Chi tiết {{$product->product_name}}"><a href="{{URL::to('chi-tiet-san-pham/'.$product->product_slug)}}">{{$product->product_name}}</a>
                  <p>{{$product->product_content}}</p>
                  <input type="hidden" name="productid_hidden" value="{{$product->product_id}}"><br>
                        <form action="">
                            @csrf
                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                            <input type="hidden" class="cart_product_qty_{{$product->product_id}}"  name="cart_product_quantity" min="1" oninput="validity.valid||(value='');" value="1">
                            <input type="hidden" name="productid_hidden" value="{{$product->product_id}}">

                        </form>
                </div>
                <!-- Price -->
                <span class="price">{{number_format($product->product_price)}} VND</span> </div>
            @endforeach
          </div>
        </div>
      </section>
      {{-- sản phẩm theo thwuogn hiệu --}}
      <section class="padding-top-50 padding-bottom-50">
        <div class="container">

          <!-- Main Heading -->
          <div class="heading text-center">
            <h4>Sản phẩm giảm giá</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
            Sed feugiat, tellus vel tristique posuere, diam</span> </div>

          <!-- Popular Item Slide -->
          <div class="papular-block block-slide">
            <!-- Item -->
            @foreach ($all_product_sale as $key => $product)
            <div class="item">
                <!-- Item img -->
                <div class="item-img"> <img class="img-1" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" ><img class="img-2" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" >
                  <!-- Overlay -->
                  <div class="overlay">
                    <div class="position-center-center">
                      <div class="inn">
                          {{-- <a href="{{URL::to('public/uploads/product/'.$product->product_image)}}" data-lighter><i class="icon-magnifier"></i></a> --}}
                          <a type="button" class="add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart" title="Thêm vào giỏ hàng" data-toggle="tooltip" data-placement="top"><i class="pegk pe-7s-cart"></i></a>
                          <a type="button" data-toggle="modal" data-target="#xemnhanh" class=" xemnhanh" data-id_product="{{$product->product_id}}" title="Xem nhanh" data-placement="top"><i class="pegk pe-7s-search"></i></a>
                          <a href="#." data-toggle="tooltip" data-placement="top" title="Thêm vào danh sách yêu thích"><i class="pegk pe-7s-like"></i></a>
                        </div>
                    </div>
                  </div>
                </div>

                <!-- Item Name -->
                <div class="item-name" data-toggle="tooltip" data-placement="top" title="Chi tiết {{$product->product_name}}"><a href="{{URL::to('chi-tiet-san-pham/'.$product->product_slug)}}">{{$product->product_name}}</a>
                  <p>{{$product->product_content}}</p>
                  <input type="hidden" name="productid_hidden" value="{{$product->product_id}}"><br>
                        <form action="">
                            @csrf
                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                            <input type="hidden" class="cart_product_qty_{{$product->product_id}}"  name="cart_product_quantity" min="1" oninput="validity.valid||(value='');" value="1">
                            <input type="hidden" name="productid_hidden" value="{{$product->product_id}}">

                        </form>
                </div>
                <!-- Price -->
                <span class="price">{{number_format($product->product_price)}} VND</span> </div>
            @endforeach
          </div>
        </div>
      </section>
{{--  --}}
<!-- Modal -->
<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-top: 23%;">
    <div class="modal-dialog" role="document" style="max-width:900px;width:100%">
      <div class="modal-content">
        <div class="row">
            <div class="col-md-5">
                Hình ảnh
                <span id="product_quickview_image" class="hinhanh"></span>
                <span id="product_quickview_gallery" class="hinhanh"></span>
                <style>
                    .hinhanh img{
                        width: 100%;
                        height: 200px;
                    }
                    .color_black ,.color_black span{
                        color: #000;
                    }
                </style>
            </div>
            <form action="">
                @csrf
                <div id="product_quickview_value"></div>
            <div class="col-md-7">
                Mô tả sản phẩm
                <h2>Tên : <span id="product_quickview_title"></span></h2>
                <p class="color_black">Mã ID : <span id="product_quickview_id"></span></p>
                <p class="color_black">Giá : <span id="product_quickview_price"></span> VND</p>
                <p class="color_black">Tiêu đề : <span id="product_quickview_desc"></span></p>
                <p class="color_black">Nội dung : <span id="product_quickview_content"></span></p>
                <label>Số lượng : <input type="number" name="qty" min="1" class="cart_product_qty_" value="1" readonly>
                </label>
                <div id="product_quickview_button"></div>
                <div class="beforesned_quickview"></div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
            </div>
       </div>
{{--  --}}
      <!-- Knowledge Share -->
      <section class="light-gray-bg padding-top-150 padding-bottom-150">
        <div class="container">

          <!-- Main Heading -->
          <div class="heading text-center">
            <h4>knowledge share</h4>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
            Sed feugiat, tellus vel tristique posuere, diam</span> </div>
          <div class="knowledge-share">
            <ul class="row">

              <!-- Post 1 -->
              <li class="col-md-6">
                <div class="date"> <span>December</span> <span class="huge">27</span> </div>
                <a href="#.">Donec commo is vulputate</a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. Sed feugiat, tellus vel tristique posuere, diam</p>
                <span>By <strong>Admin</strong></span> </li>

              <!-- Post 2 -->
              <li class="col-md-6">
                <div class="date"> <span>December</span> <span class="huge">09</span> </div>
                <a href="#.">Donec commo is vulputate</a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. Sed feugiat, tellus vel tristique posuere, diam</p>
                <span>By <strong>Admin</strong></span> </li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Testimonial -->
      <section class="testimonial padding-top-100">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">

              <!-- SLide -->
              <div class="single-slide">

                <!-- Slide -->
                <div class="testi-in"> <i class="fa fa-quote-left"></i>
                  <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu posuere odio luctus non. Nulla lacinia, eros vel fermentum consectetur, risus p</p>
                  <h5>john smith</h5>
                </div>

                <!-- Slide -->
                <div class="testi-in"> <i class="fa fa-quote-left"></i>
                  <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu posuere odio luctus non. Nulla lacinia, eros vel fermentum consectetur, risus p</p>
                  <h5>john smith</h5>
                </div>

                <!-- Slide -->
                <div class="testi-in"> <i class="fa fa-quote-left"></i>
                  <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu posuere odio luctus non. Nulla lacinia, eros vel fermentum consectetur, risus p</p>
                  <h5>john smith</h5>
                </div>
              </div>
            </div>

            <!-- Img -->
            <div class="col-sm-6"> <img class="img-responsive" src="images/testi-avatar.jpg" alt=""> </div>
          </div>
        </div>
      </section>

      <!-- About -->
      <section class="small-about padding-top-150 padding-bottom-150">
        <div class="container">

          <!-- Main Heading -->
          <div class="heading text-center">
            <h4>about ecoshop</h4>
            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu posuere odio luctus non. Nulla lacinia,
              eros vel fermentum consectetur, risus purus tempc, et iaculis odio dolor in ex. </p>
          </div>

          <!-- Social Icons -->
          <ul class="social_icons">
            <li><a href="#."><i class="icon-social-facebook"></i></a></li>
            <li><a href="#."><i class="icon-social-twitter"></i></a></li>
            <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
            <li><a href="#."><i class="icon-social-youtube"></i></a></li>
            <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
          </ul>
        </div>
      </section>
    </div>

@endsection
