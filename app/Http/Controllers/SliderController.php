<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
// session_start();

class SliderController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_slider()
    {
        $this->check();
        $cate_slider = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        return view('admin.slider.add_slider')->with('cate_slider',$cate_slider);
    }
    public function all_slider()
    {
        $this->check();
        $all_slider = DB::table('tbl_slider')
        ->join('tbl_category', 'tbl_slider.category_id', '=', 'tbl_category.category_id')->orderBy('tbl_slider.slider_id','desc')
         ->get();
        $manager_slider = view('admin.slider.all_slider')->with('all_slider',$all_slider);
        return view('admin_layout')->with('admin.slider.all_slider',$manager_slider);
    }
    public function save_slider(Request $request)
    {
        $this->check();
        $data = array();
        $data['slider_name'] = $request->slider_name;
        $data['slider_desc'] = $request->slider_desc;
        $data['category_id'] = $request->slider_cate;
        $data['slider_status'] = $request->slider_status;
        $get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['slider_image'] = $new_image;
            DB::table('tbl_slider')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('all-slider');
        }
        $data['slider_image'] = '';
        DB::table('tbl_slider')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('all-slider');
    }
    public function unactive_slider($slider_id){
        $this->check();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
        return Redirect::to('all-slider');
    }
    public function active_slider($slider_id){
        $this->check();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>0]);
        return Redirect::to('all-slider');
    }
    public function edit_slider($slider_id){
        $this->check();
        $cate_slider = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $edit_slider = DB::table('tbl_slider')->where('slider_id',$slider_id)->get();
        $manager_slider = view('admin.slider.edit_slider')->with('edit_slider',$edit_slider)->with('cate_slider',$cate_slider);
        return view('admin_layout')->with('admin.slider.edit_slider',$manager_slider);
    }
    public function update_slider(Request $request,$slider_id){
        $this->check();
        $data = array();
        $data['slider_name'] = $request->slider_name;
        $data['slider_desc'] = $request->slider_desc;
        $data['category_id'] = $request->slider_cate;
        $get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['slider_image'] = $new_image;
            DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-slider');
        }
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-slider');
    }
    public function delete_slider($slider_id){
        $this->check();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
        return Redirect::to('all-slider');
    }
    //End Admin
    public function details_slider($slider_id){
        $cate_slider = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id','desc')->get();
        $details_slider = DB::table('tbl_slider')
        ->join('tbl_category', 'tbl_slider.category_id', '=', 'tbl_category.category_id')->where('tbl_slider.slider_id',$slider_id)
         ->get();
        // foreach($show_slider as $key=>$show){
        //     $show_slider = $show->category_id;
        // }
        $related_slider = DB::table('tbl_slider')
        ->join('tbl_category', 'tbl_slider.category_id', '=', 'tbl_category.category_id')->where('tbl_slider.category_id',$slider_id)
         ->get();

        return view('pages.slider.show_slider')->with('category',$cate_slider)->with('show_slider',$details_slider)->with('related',$related_slider);

    }
}
