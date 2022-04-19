@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">

        <div class="register-req">
            <p>Thanh toán giỏ hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">


            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <?php
                $content = Cart::content();
                // echo '<pre>';
                //     print_r($content);
                //     echo '</pre>';
                    ?>
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $v_content )


                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="" width="50px"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price).'VNĐ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                                <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="number" class="cart_quantity_input" min="1" oninput="validity.valid||(value='');" type="text" name="cart_quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                <input type="submit" name="update_qty" class="btn btn-default btn-sm" value="Cập nhật">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal).' '.'VNĐ';
                                    ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <h4>Phương thức thanh toán</h4>
        <form action="{{URL::to('/order-place')}}" method="POST">
            {{ csrf_field() }}
            <div class="payment-options">
                <span>
                    <label><input type="radio" name="payment_option" value="1"> Thanh toán online</label>
                </span>
                <span>
                    <label><input type="radio" name="payment_option" value="2"> Giao hàng trả sau</label>
                </span><br>
                {{-- <span>
                    <label><input type="checkbox"> Paypal</label>
                </span> --}}
                <input type="submit" value="Đặt hàng" name="order_place" class="btn btn-primary btn-sm">

            </div>
        </form>
    </div>
</section> <!--/#cart_items-->

@endsection
