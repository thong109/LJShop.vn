<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Customer;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
// session_start();

class MailAdminController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function send_coupon()
    {
        $customer_vip = Customer::where('customer_vip', 1)->get();
        $now = Carbon::now('Asia/Ho_Chi_minh')->format('d-m-Y H:i:s');
        $title_mail = "Mã khuyến mãi ngày".' '.$now;
        $data = [];
        foreach($customer_vip as $key => $vip){
            $data['email'][] = $vip->customer_email;
        }
        Mail::send('pages.send_coupon.send_coupon', $data ,function($message) use ($title_mail,$data)
        {
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });
        return redirect()->back()->with('message','Gửi thành công');
    }
    public function mail_example(){
        $coupon = Coupon::all();
        return view('pages.send_coupon.send_coupon',compact('coupon'));
    }
    public function all_customer(){
        $customer = Customer::all();
        return view('admin.customer.customer_list',compact('customer'));
    }
    public function unactive_cus($customer_id){
        $this->check();
        Customer::where('customer_id',$customer_id)->update(['customer_vip'=>0]);
        return Redirect::to('customer-list');
    }
    public function active_cus($customer_id){
        $this->check();
        Customer::where('customer_id',$customer_id)->update(['customer_vip'=>1]);
        return Redirect::to('customer-list');
    }
}
