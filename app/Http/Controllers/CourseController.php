<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
// session_start();

class CourseController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_course()
    {
        $this->check();
        $cate_course = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        return view('admin.course.add_course')->with('cate_course',$cate_course);
    }
    public function all_course()
    {
        $this->check();
        $all_course = DB::table('tbl_course')
        ->join('tbl_category', 'tbl_course.category_id', '=', 'tbl_category.category_id')->orderBy('tbl_course.course_id','desc')
         ->get();
        $manager_course = view('admin.course.all_course')->with('all_course',$all_course);
        return view('admin_layout')->with('admin.course.all_course',$manager_course);
    }
    public function save_course(Request $request)
    {
        $this->check();
        $data = array();
        $data['course_name'] = $request->course_name;
        $data['course_desc'] = $request->course_desc;
        $data['category_id'] = $request->course_cate;
        $data['course_status'] = $request->course_status;
        $get_image = $request->file('course_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['course_image'] = $new_image;
            DB::table('tbl_course')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('all-course');
        }
        $data['course_image'] = '';
        DB::table('tbl_course')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('all-course');
    }
    public function unactive_course($course_id){
        $this->check();
        DB::table('tbl_course')->where('course_id',$course_id)->update(['course_status'=>1]);
        return Redirect::to('all-course');
    }
    public function active_course($course_id){
        $this->check();
        DB::table('tbl_course')->where('course_id',$course_id)->update(['course_status'=>0]);
        return Redirect::to('all-course');
    }
    public function edit_course($course_id){
        $this->check();
        $cate_course = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $edit_course = DB::table('tbl_course')->where('course_id',$course_id)->get();
        $manager_course = view('admin.course.edit_course')->with('edit_course',$edit_course)->with('cate_course',$cate_course);
        return view('admin_layout')->with('admin.course.edit_course',$manager_course);
    }
    public function update_course(Request $request,$course_id){
        $this->check();
        $data = array();
        $data['course_name'] = $request->course_name;
        $data['course_desc'] = $request->course_desc;
        $data['category_id'] = $request->course_cate;
        $get_image = $request->file('course_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['course_image'] = $new_image;
            DB::table('tbl_course')->where('course_id',$course_id)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-course');
        }
        DB::table('tbl_course')->where('course_id',$course_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-course');
    }
    public function delete_course($course_id){
        $this->check();
        DB::table('tbl_course')->where('course_id',$course_id)->delete();
        return Redirect::to('all-course');
    }
    //End Admin
    public function details_course($course_id){
        $cate_course = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id','desc')->get();
        $details_course = DB::table('tbl_course')
        ->join('tbl_category', 'tbl_course.category_id', '=', 'tbl_category.category_id')->where('tbl_course.course_id',$course_id)
         ->get();
        foreach($details_course as $key => $value){
            $category_id = $value->category_id;
        }
        $related_course = DB::table('tbl_course')
        ->join('tbl_category', 'tbl_course.category_id', '=', 'tbl_category.category_id')->where('tbl_course.category_id',$category_id)
         ->whereNotIn('tbl_course.course_id',[$course_id])->get();

        return view('pages.course.show_course')->with('category',$cate_course)->with('show_course',$details_course)->with('related_course',$related_course);

    }
}
