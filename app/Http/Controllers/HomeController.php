<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use App\Models\Comment;
// session_start();

class HomeController extends Controller
{
    public function index(Request $request){
        $meta_desc = "Chuyên bán máy ảnh và phụ kiện máy ảnh";
        $meta_keywords = "may anh, máy ảnh, phụ kiện,phu kien, phụ kiện máy ảnh, phu kien may anh";
        $meta_title = "LJShop.vn | Trang chủ";
        $url_canonical = $request->url();
        $category = Category::where('category_status','0')->orderBy('category_id','desc')->get();
        $all_product = Product::where('product_status','0')->orderBy('product_id','desc')->limit(12)->get();
        $all_product_sale = Product::where('product_status','0')->orderBy('product_price','asc')->limit(12)->get();
        $all_banner = DB::table('tbl_banner')->where('banner_status','0')->orderBy('banner_id','desc')->limit(4)->get();
        $all_slider = DB::table('tbl_slider')->where('slider_status','0')->orderBy('slider_id','desc')->limit(5)->get();
        $all_sponsor = DB::table('tbl_sponsor')->where('sponsor_status','0')->orderBy('sponsor_id','desc')->limit(4)->get();
        $all_course = DB::table('tbl_course')->where('course_status','0')->orderBy('course_id','desc')->limit(6)->get();
        $all_activity = Activity::where('activity_status','0')->orderBy('activity_id','desc')->limit(6)->get();
        return view('pages.home')->with(compact('all_product_sale','category','all_product','all_banner','all_slider','all_sponsor','all_course','all_activity','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function activity(Request $request){
        $meta_desc = "Chuyên bán máy ảnh và phụ kiện máy ảnh";
        $meta_keywords = "may anh, máy ảnh, phụ kiện,phu kien, phụ kiện máy ảnh, phu kien may anh";
        $meta_title = "LJShop.vn | Tin tức";
        $url_canonical = $request->url();
        $all_activity = Activity::where('activity_status','0')->orderBy('activity_id','desc')->limit(6)->get();
        return view('pages.activity')->with('activity',$all_activity)->with(compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function sponsor(){
        $all_sponsor = DB::table('tbl_sponsor')->where('sponsor_status','0')->orderBy('sponsor_id','desc')->limit(6)->get();
        return view('pages.sponsor')->with('sponsor',$all_sponsor);
    }
    public function course(){
        $all_course = DB::table('tbl_course')->where('course_status','0')->orderBy('course_id','desc')->limit(6)->get();
        // $all_news = DB::table('tbl_news')->where('news_status','0')->orderBy('news_id','desc')->limit(6)->get();
        return view('pages.course')->with('course',$all_course)->with('news');
    }
    public function timkiem(Request $request){
        $meta_desc = "Chuyên bán máy ảnh và phụ kiện máy ảnh";
        $meta_keywords = "may anh, máy ảnh, phụ kiện,phu kien, phụ kiện máy ảnh, phu kien may anh";
        $meta_title = "LJShop.vn | Tìm kiếm";
        $url_canonical = $request->url();
        $category = Category::where('category_status','0')->orderBy('category_id','desc')->get();
        $search_product = Product::where('product_name','like','%'.$request->keyword.'%')->orWhere('product_price',$request->keyword)->get();
        return view('pages.product.search',compact('search_product','category','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $product = Product::where('product_status',0)->where('product_name','like','%'.$data['query'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block;width:100%">';
            foreach($product as $key => $word){
                $output .='
                    <li class="li_search_ajax"><a href="#.">'.$word->product_name.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
    public function product_by_category($category_id,Request $request)
    {
        $meta_desc = "Chuyên bán máy ảnh và phụ kiện máy ảnh";
        $meta_keywords = "may anh, máy ảnh, phụ kiện,phu kien, phụ kiện máy ảnh, phu kien may anh";
        $meta_title = "LJShop.vn | ";
        $url_canonical = $request->url();
        $show_product_by_cate = Product::where('category_id',$category_id)->OrderBy('product_price','asc')->get();
        $category = Category::all();
        return view('pages.product.show_product_by_cate')
        ->with(compact('category','show_product_by_cate','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
}
