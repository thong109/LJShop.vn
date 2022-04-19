@extends('layout')
@section('content')
<div class="features_items">
    <!--features_items-->
    @foreach ($category_name as $key => $name_cate)
    <h2 class="title text-center">{{$name_cate->category_name}}</h2>
    @endforeach
    @foreach ($category_id as $key=>$pro_id)
    <a href="{{URL::to('/chi-tiet-san-pham/'.$pro_id->product_slug)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/uploads/product/'.$pro_id->product_image)}}" alt="" />
                        <h2>{{$pro_id->product_price}} VNĐ</h2>
                        <p>{{$pro_id->product_name}}</p></a>
    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
    </div>
    </div>
    <div class="choose">
    <ul class="nav nav-pills nav-justified">
    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
    </ul>
    </div>
    </div>
    </div>

    @endforeach
</div>

<!--features_items-->
@endsection
