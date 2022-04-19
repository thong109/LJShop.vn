<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
// session_start();

class ActivityController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_activity()
    {
        $this->check();
        $cate_activity = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        return view('admin.activity.add_activity')->with('cate_activity',$cate_activity);
    }
    public function all_activity()
    {
        $this->check();
        $all_activity = Activity::join('tbl_category', 'tbl_activity.category_id', '=', 'tbl_category.category_id')->orderBy('tbl_activity.activity_id','desc')
         ->get();
        $manager_activity = view('admin.activity.all_activity')->with('all_activity',$all_activity);
        return view('admin_layout')->with('admin.activity.all_activity',$manager_activity);
    }
    public function save_activity(Request $request)
    {
        $this->check();
        $data = array();
        $data['activity_name'] = $request->activity_name;
        $data['activity_desc'] = $request->activity_desc;
        $data['category_id'] = 1;
        $data['activity_status'] = $request->activity_status;
        $get_image = $request->file('activity_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['activity_image'] = $new_image;
            Activity::insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('all-activity');
        }
        $data['activity_image'] = '';
        Activity::insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('all-activity');
    }
    public function unactive_activity($activity_id){
        $this->check();
        Activity::where('activity_id',$activity_id)->update(['activity_status'=>1]);
        return Redirect::to('all-activity');
    }
    public function active_activity($activity_id){
        $this->check();
        Activity::where('activity_id',$activity_id)->update(['activity_status'=>0]);
        return Redirect::to('all-activity');
    }
    public function edit_activity($activity_id){
        $this->check();
        $cate_activity = Category::orderBy('category_id','desc')->get();
        $edit_activity = Activity::where('activity_id',$activity_id)->get();
        $manager_activity = view('admin.activity.edit_activity')->with('edit_activity',$edit_activity)->with('cate_activity',$cate_activity);
        return view('admin_layout')->with('admin.activity.edit_activity',$manager_activity);
    }
    public function update_activity(Request $request,$activity_id){
        $this->check();
        $data = array();
        $data['activity_name'] = $request->activity_name;
        $data['activity_desc'] = $request->activity_desc;
        $data['category_id'] = $request->activity_cate;
        $get_image = $request->file('activity_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['activity_image'] = $new_image;
            Activity::where('activity_id',$activity_id)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-activity');
        }
        Activity::where('activity_id',$activity_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-activity');
    }
    public function delete_activity($activity_id){
        $this->check();
        Activity::where('activity_id',$activity_id)->delete();
        return Redirect::to('all-activity');
    }
    //End Admin
    public function details_activity($activity_id){
        $cate_activity = Category::where('category_status','0')->orderBy('category_id','desc')->get();
        $details_activity = Activity::join('tbl_category', 'tbl_activity.category_id', '=', 'tbl_category.category_id')->where('tbl_activity.activity_id',$activity_id)
         ->get();
        // foreach($show_activity as $key=>$show){
        //     $show_activity = $show->category_id;
        // }
        $related_activity = Activity::join('tbl_category', 'tbl_activity.category_id', '=', 'tbl_category.category_id')->where('tbl_activity.category_id',$activity_id)
         ->limit(4)->get();

        return view('pages.activity.show_activity')->with('category',$cate_activity)->with('show_activity',$details_activity)->with('related',$related_activity);

    }
}
