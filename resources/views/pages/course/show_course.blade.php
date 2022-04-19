@extends('layout')
@section('content')
@foreach ($show_course as $key=> $show)
                    <div class="item">
                    <div class="img_course">
                         <img src="{{asset('/public/uploads/product/'.$show->course_image)}}" alt="" class="course_img">
                    </div>
                      <p class="course_show">{{$show->course_desc}}</p>
                    </div>
    {{-- <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="">
            <h2>{{$show->product_name}}</h2>
            <p>Web ID: 1089772</p>
            <img src="images/product-details/rating.png" alt="">
            <span>
                <span>{{$show->product_price}} VNĐ</span>
                <label>Số lượng:</label>
                <input type="text" value="0"><br>
                <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Thêm vào giỏ hàng
                </button>
            </span>
            <p><b>Trình trạng:</b> Còn hàng</p>
            <p><b>Đặc điểm:</b> Mới</p>
            <p><b>Danh mục</b> {{$show->category_name}}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a>
        </div><!--/product-information-->
    </div> --}}

</div>
@endforeach
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($related_course as $key => $lienquan)
            <div class="item active">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/uploads/product/'.$lienquan->course_image)}}" alt="">
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
    </div>
</div>
@endsection
