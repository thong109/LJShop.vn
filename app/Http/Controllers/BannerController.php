<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
// session_start();

class BannerController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_banner()
    {
        $this->check();
        $cate_banner = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        return view('admin.banner.add_banner')->with('cate_banner',$cate_banner);
    }
    public function all_banner()
    {
        $this->check();
        $all_banner = DB::table('tbl_banner')
        ->join('tbl_category', 'tbl_banner.category_id', '=', 'tbl_category.category_id')->orderBy('tbl_banner.banner_id','desc')
         ->get();
        $manager_banner = view('admin.banner.all_banner')->with('all_banner',$all_banner);
        return view('admin_layout')->with('admin.banner.all_banner',$manager_banner);
    }
    public function save_banner(Request $request)
    {
        $this->check();
        $data = array();
        $data['banner_name'] = $request->banner_name;
        $data['banner_desc'] = $request->banner_desc;
        $data['banner_content'] = $request->banner_content;
        $data['category_id'] = 1;
        $data['banner_status'] = $request->banner_status;
        $get_image = $request->file('banner_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['banner_image'] = $new_image;
            DB::table('tbl_banner')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('all-banner');
        }
        $data['banner_image'] = '';
        DB::table('tbl_banner')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('all-banner');
    }
    public function unactive_banner($banner_id){
        $this->check();
        DB::table('tbl_banner')->where('banner_id',$banner_id)->update(['banner_status'=>1]);
        return Redirect::to('all-banner');
    }
    public function active_banner($banner_id){
        $this->check();
        DB::table('tbl_banner')->where('banner_id',$banner_id)->update(['banner_status'=>0]);
        return Redirect::to('all-banner');
    }
    public function edit_banner($banner_id){
        $this->check();
        $cate_banner = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $edit_banner = DB::table('tbl_banner')->where('banner_id',$banner_id)->get();
        $manager_banner = view('admin.banner.edit_banner')->with('edit_banner',$edit_banner)->with('cate_banner',$cate_banner);
        return view('admin_layout')->with('admin.banner.edit_banner',$manager_banner);
    }
    public function update_banner(Request $request,$banner_id){
        $this->check();
        $data = array();
        $data['banner_name'] = $request->banner_name;
        $data['banner_desc'] = $request->banner_desc;
        $data['banner_content'] = $request->banner_content;
        $data['category_id'] = $request->banner_cate;
        $get_image = $request->file('banner_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['banner_image'] = $new_image;
            DB::table('tbl_banner')->where('banner_id',$banner_id)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-banner');
        }
        DB::table('tbl_banner')->where('banner_id',$banner_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-banner');
    }
    public function delete_banner($banner_id){
        $this->check();
        DB::table('tbl_banner')->where('banner_id',$banner_id)->delete();
        return Redirect::to('all-banner');
    }
     //End Admin
     public function details_banner($banner_id){
        $cate_banner = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id','desc')->get();
        $details_banner = DB::table('tbl_banner')
        ->join('tbl_category', 'tbl_banner.category_id', '=', 'tbl_category.category_id')->where('tbl_banner.banner_id',$banner_id)
         ->get();
        // foreach($show_banner as $key=>$show){
        //     $show_banner = $show->category_id;
        // }
        $related_banner = DB::table('tbl_banner')
        ->join('tbl_category', 'tbl_banner.category_id', '=', 'tbl_category.category_id')->where('tbl_banner.category_id',$banner_id)
         ->limit(4)->get();

        return view('pages.banner.show_banner')->with('category',$cate_banner)->with('show_banner',$details_banner)->with('related',$related_banner);

    }
}
