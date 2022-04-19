@extends('layout')
@section('content')
<?php
        $message = Session::get('message');
        if ($message) {
            echo "<script>alert('$message')</script>";
            Session::put('message',null);
        }
?>
<section id="cart_items">
    <div class="container">

        <div class="table-responsive cart_info">
            <form action="{{url('/update-cart')}}" method="POST">
                @csrf <br>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="description">Số lượng trong kho</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng mua</td>
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
                        <td class="cart_description">
                            <h4>{{$cart['product_quantity']}}</h4>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($cart['product_price'])}} VND</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input type="number" class="cart_quantity" min="1"  oninput="validity.valid||(value='');" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" autocomplete="off" size="2">
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
                            @if (Session::get('customer'))
                                <a href="{{url('checkout')}}" class="btn btn-default btn-sm check_out">Đặt hàng</a>
                            @else
                                <a href="{{url('login-checkout')}}" class="btn btn-default btn-sm check_out">Đặt hàng</a>
                            @endif
                        </td>
                        <td>
                            <li>Tổng :<span>{{number_format($total)}} VND</span></li>
                            @if (Session::get('coupon'))
                            <li>
                                    @foreach (Session::get('coupon') as $key => $cou)
                                        @if ($cou['coupon_condition'] ==1)
                                            Mã giảm : {{$cou['coupon_number']}} %
                                            <p>
                                                @php
                                                    $total_coupon = ($total*$cou['coupon_number'])/100;
                                                    echo '<p>Tổng giảm :'.number_format($total_coupon).' VND</p>';
                                                @endphp
                                            </p>
                                            <p>Tổng : {{number_format($total - $total_coupon)}} VND</p>
                                            <a href="{{url('del-cou')}}" class="btn btn-susscess">Xóa mã</a>
                                            @elseif ($cou['coupon_condition']==2)
                                            Mã giảm : {{number_format($cou['coupon_number'])}} VND
                                            <p>
                                                @php
                                                    $total_coupon = ($total - $cou['coupon_number']);
                                                @endphp
                                            </p>
                                            <p>Tổng : {{number_format($total_coupon)}} VND</p>
                                            <a href="{{url('del-cou')}}" class="btn btn-susscess">Xóa mã</a>
                                        @endif
                                    @endforeach
                            </li>

                            @endif
                            {{-- <li>Thuế <span></span></li>
                            <li>Phí vận chuyển <span>Free</span></li> --}}
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
        @if(Session::get('cart'))
        <tr>
            <td colspan="5">
                <form action="{{url('/check-coupon')}}" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá">
                    <input type="submit" name="form-control check_coupon" class="btn btn-default btn-sm check_coupon" value="Mã giảm giá">
                </form>
            </td>
        </tr>
        @endif
        </div>
    </div>
</section> <!--/#cart_items-->
{{-- <section id="do_action">
    <div class="container">

        <div class="row">

            <div class="col-sm-6">
                <div class="total_area">
                    <ul>

                    </ul>
                        <a href="">Thanh toán</a>
                        <a href="">Mã giảm giá</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action--> --}}
@endsection
