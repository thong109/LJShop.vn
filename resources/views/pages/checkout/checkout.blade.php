@extends('layout')
@section('content')
<?php
    $message = Session::get('message');
    if ($message) {
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
    }
    $error = Session::get('error');
    if ($error) {
        echo '<span class="text-alert">'.$error.'</span>';
        Session::put('error',null);
    }
?>
<section id="cart_items">
    <div class="container">
        <div class="col-sm-12 clearfix">
            <div class="table-responsive cart_info">
                <form action="{{url('/update-cart')}}" method="POST">
                    @csrf <br>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Thành tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (Session::get('cart')==true)
                        @php
                        $total = 0;
                        @endphp
                        @foreach (Session::get('cart') as $key => $cart)
                        @php
                            $subtotal = $cart['product_price']*$cart['product_qty'];
                            $total+=$subtotal;
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}" width="50px"></a>
                            </td>
                            <td class="cart_description">
                                <h4>{{$cart['product_name']}}</h4>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($cart['product_price'])}} VND</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input type="number" class="cart_quantity" min="1" oninput="validity.valid||(value='');" type="text" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" autocomplete="off" size="2" max="20">
                                    <input type="hidden" value="" name="rowId_cart" class="form-control">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    {{number_format($subtotal)}} VND
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('/delete-sp/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td><input type="submit" name="update-cart" class="btn btn-default btn-sm" value="Cập nhật"></td>
                            <td><a href="{{url('/delete-all-cart/')}}" class="btn btn-default check_out">Xóa tất cả</a></td>
                            <td>
                                <li>Tổng tiền hàng :<span>{{number_format($total)}} VND</span></li>

                                @if (Session::get('coupon'))
                                <li>
                                        @foreach (Session::get('coupon') as $key => $cou)
                                            @if ($cou['coupon_condition'] ==1)
                                                Mã giảm : {{$cou['coupon_number']}} %
                                                <p>
                                                    @php
                                                        $total_coupon = ($total*$cou['coupon_number'])/100;
                                                    @endphp
                                                </p>
                                                <p>
                                                    @php
                                                        $total_after_coupon = $total - $total_coupon;
                                                    @endphp
                                                </p>
                                                {{-- <a href="{{url('del-cou')}}" class="btn btn-susscess">Xóa mã</a> --}}
                                                @elseif ($cou['coupon_condition']==2)
                                                Mã giảm : {{number_format($cou['coupon_number'])}} VND
                                                <p>
                                                    @php
                                                        $total_coupon = $total - $cou['coupon_number'];
                                                    @endphp
                                                </p>
                                                <p>
                                                    @php
                                                    $total_after_coupon = $total_coupon;
                                                @endphp
                                                </p>
                                                <a href="{{url('del-cou')}}" class="btn btn-susscess">Xóa mã</a>
                                            @endif
                                        @endforeach


                                @endif
                                {{-- <li>Thuế <span></span></li>--}}
                                @if (Session::get('fee'))
                                <li>
                                    <a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a>
                                    Phí vận chuyển <span>{{number_format(Session::get('fee'))}} VND</span></li>
                                    @php
                                        $total_after_fee = $total + Session::get('fee');
                                    @endphp
                                @endif
                                <li>Tổng còn : </li>
                                @php
                                    if(Session::get('fee') && !Session::get('coupon')){
                                        $total_after = $total_after_fee;
                                        echo number_format($total_after);
                                    }elseif (!Session::get('fee') && Session::get('coupon')) {
                                        $total_after = $total_after_coupon;
                                        echo number_format($total_after);
                                    }elseif (Session::get('fee') && Session::get('coupon')) {
                                        $total_after = $total_after_coupon;
                                        $total_after = $total_after + Session::get('fee');
                                        echo number_format($total_after);
                                    }elseif (!Session::get('fee') && !Session::get('coupon')) {
                                        $total_after = $total;
                                        echo number_format($total_after);
                                    }
                                @endphp
                                VND
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="5">
                                <center>
                                    @php
                                        echo 'Chưa có sản phẩm trong giỏ';
                                    @endphp
                                </center>
                            </td>
                        </tr>
                    </tbody>
                    @endif
                </table>
            </form>
            {{-- @if(Session::get('cart'))
            <tr>
                <td colspan="5">
                    <form action="{{url('/check-coupon')}}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá">
                        <input type="submit" name="form-control check_coupon" class="btn btn-default btn-sm check_coupon" value="Mã giảm giá">
                    </form>
                </td>
            </tr>
            @endif --}}
            </div>
        </div>
        {{-- THông tin --}}
        @if (Session::get('cart'))
        <div class="shopper-informations">
            <div class="row">

                <div class="col-sm-10 clearfix">
                    <div class="bill-to">
                        <p>Thông tin gửi hàng</p>
                        <div class="form-one">
                            <form role="form">
                                @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-lg m-bot15 city choose ">
                                    <option value="">---Chọn thành phố---</option>
                                    @foreach ($city as $key => $c_t)
                                        <option value="{{$c_t->matp}}">{{$c_t->name_city}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                <select name="province" id="province" class="form-control input-lg m-bot15 province choose ">
                                    <option value="">---Chọn quận huyện---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                <select name="wards" id="wards" class="form-control input-lg m-bot15 wards">
                                    <option value="">---Chọn xã phường---</option>
                                </select>
                            </div>
                            <input type="button" value="Tính phí vận chuyển" name="caculate_order" class="btn btn-primary btn-sm caculate_delivery">
                        </form>
                        <br>
                        <form method="POST">
                            @csrf
                            <input type="text" placeholder="Email*" name="shipping_email" class="shipping_email">
                            <input type="text" placeholder="Họ tên" name="shipping_name" class="shipping_name">
                            <input type="text" placeholder="Địa chỉ" name="shipping_address" class="shipping_address">
                            <input type="text" placeholder="Điện thoại" name="shipping_phone" class="shipping_phone">
                            <input type="text" placeholder="Ghi chú" name="shipping_notes" class="form-control shipping_notes">
                            @if (Session::get('fee'))
                            <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                            @else
                            <input type="hidden" name="order_fee" class="order_fee" value="30000">
                            @endif
                            @if (Session::get('coupon'))
                                @foreach (Session::get('coupon') as $key => $cou)
                                <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                                @endforeach
                            @else
                                <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                            @endif
                            <div class="">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                    <select name="payment_select" class="form-control input-lg m-bot15 payment_select">
                                        <option value="0">Thanh toán online</option>
                                        <option value="1">Thanh toán trực tiếp</option>
                                        <option value="2">Thanh toán paypal</option>
                                    </select>
                                </div>
                            </div>

                            <input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">

                        </form>
                        <br>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @endif
    </div>
</section> <!--/#cart_items-->

@endsection
