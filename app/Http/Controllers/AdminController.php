<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Social;
use App\Models\Login;
use App\Models\Order;
use App\Models\Product;
use App\Models\Statistic;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;

// session_start();
class AdminController extends Controller
{
    public function check()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return view('admin_login');
        }
    }

    public function showdashboard(Request $request)
    {
        $this->check();
        $user_ip_address = $request->ip();
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        //total last month
        $visitor_of_lastmonth = Visitor::whereBetween('date_visitors', [$early_last_month, $end_of_last_month])->get();
        $visitor_last_month_count = $visitor_of_lastmonth->count();
        //total this month
        $visitor_of_thismonth = Visitor::whereBetween('date_visitors', [$early_this_month, $now])->get();
        $visitor_this_month_count = $visitor_of_thismonth->count();
        //total in one year
        $visitor_of_year = Visitor::whereBetween('date_visitors', [$oneyears, $now])->get();
        $visitor_of_year_count = $visitor_of_year->count();
        //total online
        $visitor_of_current = Visitor::where('ip_address', $user_ip_address)->get();
        $visitor_count = $visitor_of_current->count();
        if ($visitor_count < 1) {
            $visitor = new Visitor();
            $visitor->ip_address = $user_ip_address;
            $visitor->date_visitors = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }
        //total visitor
        $visitor = Visitor::all();
        $visitor_total = $visitor->count();
        //total
        $product = Product::all()->count();
        // $product_views = Product::orderBy('product_views','desc')->take(20)->get();
        $order = Order::all()->count();
        $customer = Customer::all()->count();
        return view('admin.dashboard')->with(compact('visitor_last_month_count', 'visitor_this_month_count', 'visitor_of_year_count', 'visitor_of_year_count', 'visitor_total', 'product', 'order', 'customer', 'visitor_count'));
    }
    public function dashboard(Request $request)
    {
        // $admin_email = $request->admin_email;
        // $admin_password = $request->admin_password;

        // $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        //     // return view('admin.dashboard');
        //     // print_r($result);
        // if($result){
        //     Session::put(['admin_name' => $result->admin_name]);
        //     Session::put(['admin_id' => $result->admin_id]);
        //     return Redirect::to('/dashboard');
        // }else{
        //     // Session::put('message',"Làm ơn nhập lại");
        //     Session::put(['message' => "Nhap lai"]);
        //     return Redirect::to('/admin');
        // }
        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = $data['admin_password'];
        $login = Login::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if ($login) {
            $login_count = $login->count();
            if ($login_count > 0) {
                Session::put(['admin_name' => $login->admin_name]);
                Session::put(['admin_id' => $login->admin_id]);
                return Redirect::to('/dashboard');
            }
        } else {
            Session::put('message', "Làm ơn nhập lại");
            return Redirect::to('/admin');
        }
    }
    public function logout()
    {
        $this->check();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }
    //
    public function thongke(Request $request)
    {
        $this->check();
        $user_ip_address = $request->ip();
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        //total last month
        $visitor_of_lastmonth = Visitor::whereBetween('date_visitors', [$early_last_month, $end_of_last_month])->get();
        $visitor_last_month_count = $visitor_of_lastmonth->count();
        //total this month
        $visitor_of_thismonth = Visitor::whereBetween('date_visitors', [$early_this_month, $now])->get();
        $visitor_this_month_count = $visitor_of_thismonth->count();
        //total in one year
        $visitor_of_year = Visitor::whereBetween('date_visitors', [$oneyears, $now])->get();
        $visitor_of_year_count = $visitor_of_year->count();
        //total online
        $visitor_of_current = Visitor::where('ip_address', $user_ip_address)->get();
        $visitor_count = $visitor_of_current->count();
        if ($visitor_count < 1) {
            $visitor = new Visitor();
            $visitor->ip_address = $user_ip_address;
            $visitor->date_visitors = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }
        //total visitor
        $visitor = Visitor::all();
        $visitor_total = $visitor->count();
        //total
        $product = Product::all()->count();
        $app_order = Order::all()->count();
        $app_customer = Customer::all()->count();
        $product_views = Product::OrderBy('product_views')->get();
        return view('admin.thongke.thongke')->with(compact('visitor_last_month_count', 'visitor_this_month_count', 'visitor_of_year_count', 'visitor_of_year_count', 'visitor_total', 'product', 'app_order', 'app_customer', 'visitor_count', 'product_views'));;
    }
    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = Statistic::whereBetween('order_date', [$from_date, $to_date])->OrderBy('order_date', 'asc')->get();
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
    public function dashboard_filter(Request $request)
    {
        $data = $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $sub7ngay = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365ngay = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if ($data['dashboard_value'] == '7ngay') {
            $get = Statistic::whereBetween('order_date', [$sub7ngay, $now])->orderBy('order_date', 'asc')->get();
        } elseif ($data['dashboard_value'] == 'thangtruoc') {
            $get = Statistic::whereBetween('order_date', [$dau_thang_truoc, $cuoi_thang_truoc])->orderBy('order_date', 'asc')->get();
        } elseif ($data['dashboard_value'] == 'thangnay') {
            $get = Statistic::whereBetween('order_date', [$dauthangnay, $now])->orderBy('order_date', 'asc')->get();
        } else {
            $get = Statistic::whereBetween('order_date', [$sub365ngay, $now])->orderBy('order_date', 'asc')->get();
        }
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
    public function day_orders(Request $request)
    {
        $data = $request->all();
        $sub60ngay = Carbon::now('Asia/Ho_Chi_Minh')->subDay(60)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistic::whereBetween('order_date', [$sub60ngay, $now])->orderBy('order_date', 'asc')->get();
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
    }
}
