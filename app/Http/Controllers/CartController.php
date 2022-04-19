<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Models\Coupon;
use Illuminate\Support\Carbon;

// session_start();

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $product_id = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id', $product_id)->first();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        return Redirect::to('show-cart');
        // Cart::destroy();
    }
    public function show_cart(Request $request)
    {
        $meta_desc = "Chuyên bán máy ảnh và phụ kiện máy ảnh";
        $meta_keywords = "may anh, máy ảnh, phụ kiện,phu kien, phụ kiện máy ảnh, phu kien may anh";
        $url_canonical = $request->url();
        $meta_title = "LJShop.vn | Giỏ hàng ";
        $cate_product = DB::table('tbl_category')->where('category_status', '0')->orderBy('category_id', 'desc')->get();
        return view('cart.show_cart')->with('category', $cate_product)->with(compact('meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
    }
    // public function delete_to_cart($rowId){
    //     Cart::update($rowId,0);
    //     return Redirect::to('show-cart');
    // }
    public function update_cart_quantity(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);
        return Redirect::to('show-cart');
    }
    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    $is_avaiable++;
                    $cart[$key]['product_qty'] += 1;
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_quantity' => $data['cart_product_quantity'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_sale_after']
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_sale_after'],
            );
        }
        Session::put('cart', $cart);
        Session::save();
    }

    public function gio_hang(Request $request)
    {
        $meta_desc = "Chuyên bán máy ảnh và phụ kiện máy ảnh";
        $meta_keywords = "gio hang";
        $url_canonical = $request->url();
        $meta_title = "LJShop.vn | Giỏ hàng ";
        $cate_product = DB::table('tbl_category')->where('category_status', '0')->orderBy('category_id', 'desc')->get();
        return view('cart.cart_ajax')->with('category', $cate_product)->with(compact('meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
    }
    public function delete_sp($session_id)
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return Redirect()->back()->with('message', 'Xóa thành công');
        } else {
            return Redirect()->back()->with('message', 'Xóa thất bại');
        }
    }
    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            $message = '';
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $val) {
                    if ($val['session_id'] == $key && $qty <= $cart[$session]['product_quantity']) {
                        $cart[$session]['product_qty'] = $qty;
                        $message .= 'Cập nhật số lượng : ' . $cart[$session]['product_name'] . ' thành công';
                    } elseif ($val['session_id'] == $key && $qty > $cart[$session]['product_quantity']) {
                        $message .= 'Cập nhật số lượng : ' . $cart[$session]['product_name'] . ' thất bại';
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', $message);
        } else {
            return redirect()->back()->with('message', 'Cập nhật giỏ hàng thất bại');
        }
    }
    public function delete_all_cart()
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message', 'Đã xóa hết giỏ hàng');
        }
    }
    public function check_coupon(Request $request)
    {
        $data = $request->all();
        if (Session::get('customer_id')) {
            $now = strtotime(Carbon::now('Asia/Ho_Chi_Minh'));
            $coupon = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->where('coupon_date_end', '>=', $now)->where('coupon_used', 'LIKE', '%' . Session::get('customer_id') . '%')->first();
            if ($coupon) {
                return redirect()->back()->with('message', 'Bạn đã sử dụng mã này rồi, vui lòng thử mã khác');
            } else {
                $now = strtotime(Carbon::now('Asia/Ho_Chi_Minh'));
                $coupon_login = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->where('coupon_date_end', '>=', $now)->first();
                if ($coupon_login) {
                    if ($coupon_login->coupon_times > 0) {
                        $count_coupon = $coupon_login->count();
                        if ($count_coupon > 0) {
                            $coupon_session = Session::get('coupon');
                            if ($coupon_session == true) {
                                $is_avaiable = 0;
                                if ($is_avaiable == 0) {
                                    $cou[] = array(
                                        'coupon_code' => $coupon_login->coupon_code,
                                        'coupon_condition' => $coupon_login->coupon_condition,
                                        'coupon_number' => $coupon_login->coupon_number,
                                    );
                                    Session::put('coupon', $cou);
                                }
                            } else {
                                $cou[] = array(
                                    'coupon_code' => $coupon_login->coupon_code,
                                    'coupon_condition' => $coupon_login->coupon_condition,
                                    'coupon_number' => $coupon_login->coupon_number,
                                );
                                Session::put('coupon', $cou);
                            }
                            Session::save();
                            return redirect()->back()->with('message', 'Áp dụng mã thành công');
                        }
                    } else {
                        Session::forget('coupon');
                        return redirect()->back()->with('message', 'Mã giảm giá đã hết số lần sử dụng');
                    }
                } else {
                    Session::forget('coupon');
                    return redirect()->back()->with('message', 'Mã giảm giá không tồn tại hoặc hết hạn');
                }
            }
        } else {
            $now = strtotime(Carbon::now('Asia/Ho_Chi_Minh'));
            $coupon = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->where('coupon_date_end', '>=', $now)->first();
            if ($coupon) {
                if ($coupon->coupon_times > 0) {
                    $count_coupon = $coupon->count();
                    if ($count_coupon > 0) {
                        $coupon_session = Session::get('coupon');
                        if ($coupon_session == true) {
                            $is_avaiable = 0;
                            if ($is_avaiable == 0) {
                                $cou[] = array(
                                    'coupon_code' => $coupon->coupon_code,
                                    'coupon_condition' => $coupon->coupon_condition,
                                    'coupon_number' => $coupon->coupon_number,
                                );
                                Session::put('coupon', $cou);
                            }
                        } else {
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_condition' => $coupon->coupon_condition,
                                'coupon_number' => $coupon->coupon_number,
                            );
                            Session::put('coupon', $cou);
                        }
                        Session::save();
                        return redirect()->back()->with('message', 'Áp dụng mã thành công');
                    }
                } else {
                    Session::forget('coupon');
                    return redirect()->back()->with('message', 'Mã giảm giá đã hết số lần sử dụng');
                }
            } else {
                Session::forget('coupon');
                return redirect()->back()->with('message', 'Mã giảm giá không tồn tại hoặc hết hạn');
            }
        }
    }
    public function del_cou()
    {
        $coupon = Session::get('coupon');
        if ($coupon == true) {
            Session::forget('coupon');
            return redirect()->back()->with('message', 'Xóa mã thành công');
        }
    }
}
