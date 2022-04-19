@extends('layout')
@section('content')

<section>

<h4 style="margin-bottom: 20px" class="container">Từ khóa tìm kiếm : {{$product_tags}}</h4>
<?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
    ?>
        <div class="container">
 <div class="papular-block block-slide">
    <!-- Item -->
    @foreach ($product_tag as $key => $product)
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

@endsection
