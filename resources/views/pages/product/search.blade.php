@extends('layout')
@section('content')


 <!-- Popular Products -->
 <section class="padding-top-50 padding-bottom-50">
    <div class="container">

      <!-- Main Heading -->
      <div class="heading text-center">
        <h4>LJShop.vn cung cấp tất cả các loại thức ăn chó, mèo</h4>
        <span>Có tất cả {{count($search_product)}} sản phẩm</span> </div>

      <!-- Popular Item Slide -->
      <div class="papular-block block-slide">
        <!-- Item -->
        @foreach ($search_product as $key => $product)
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
  </section>



@endsection
