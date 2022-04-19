<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

session_start();

class CouponController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function insert_coupon(){
        $this->check();
        return view('admin.coupon.coupon');
    }
    public function save_coupon(Request $request){
        $this->check();
        $data = $request->all();
        $coupon = new Coupon();
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_times = $data['coupon_times'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_date_start = strtotime($data['coupon_date_start']);
        $coupon->coupon_date_end = strtotime($data['coupon_date_end']);
        $coupon->save();
        Session::put('message','Thêm mã giảm giá thành công');
        return Redirect::to('coupon');
    }
    public function list_coupon(){
        $this->check();
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        $now = strtotime($today);
        $coupon = Coupon::OrderBy('coupon_id','desc')->get();
        return view('admin.coupon.list_coupon')->with(compact('coupon','now'));
    }
    public function del_coupon($coupon_id){
        $this->check();
        $coupon = Coupon::findOrFail($coupon_id);
        $result = $coupon->delete();
        if($result){
            Session::put('message','Xóa mã giảm giá thành công');
            return Redirect::to('list-coupon');
        }else{
            Session::put('message','Xóa mã giảm giá thất bại');
            return Redirect::to('list-coupon');
        }
    }
    public function unactive_coupon($coupon_id){
        $this->check();
        Coupon::where('coupon_id',$coupon_id)->update(['coupon_status'=>0]);
        return Redirect::to('list-coupon');
    }
    public function active_coupon($coupon_id){
        $this->check();
        Coupon::where('coupon_id',$coupon_id)->update(['coupon_status'=>1]);
        return Redirect::to('list-coupon');
    }
}
