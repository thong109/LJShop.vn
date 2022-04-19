<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
// session_start();

class SponsorController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_sponsor()
    {
        $this->check();
        $cate_sponsor = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        return view('admin.sponsor.add_sponsor')->with('cate_sponsor',$cate_sponsor);
    }
    public function all_sponsor()
    {
        $this->check();
        $all_sponsor = DB::table('tbl_sponsor')
        ->join('tbl_category', 'tbl_sponsor.category_id', '=', 'tbl_category.category_id')->orderBy('tbl_sponsor.sponsor_id','desc')
         ->get();
        $manager_sponsor = view('admin.sponsor.all_sponsor')->with('all_sponsor',$all_sponsor);
        return view('admin_layout')->with('admin.sponsor.all_sponsor',$manager_sponsor);
    }
    public function save_sponsor(Request $request)
    {
        $this->check();
        $data = array();
        $data['sponsor_name'] = $request->sponsor_name;
        $data['sponsor_desc'] = $request->sponsor_desc;
        $data['category_id'] = $request->sponsor_cate;
        $data['sponsor_status'] = $request->sponsor_status;
        $get_image = $request->file('sponsor_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['sponsor_image'] = $new_image;
            DB::table('tbl_sponsor')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('all-sponsor');
        }
        $data['sponsor_image'] = '';
        DB::table('tbl_sponsor')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('all-sponsor');
    }
    public function unactive_sponsor($sponsor_id){
        $this->check();
        DB::table('tbl_sponsor')->where('sponsor_id',$sponsor_id)->update(['sponsor_status'=>1]);
        return Redirect::to('all-sponsor');
    }
    public function active_sponsor($sponsor_id){
        $this->check();
        DB::table('tbl_sponsor')->where('sponsor_id',$sponsor_id)->update(['sponsor_status'=>0]);
        return Redirect::to('all-sponsor');
    }
    public function edit_sponsor($sponsor_id){
        $this->check();
        $cate_sponsor = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $edit_sponsor = DB::table('tbl_sponsor')->where('sponsor_id',$sponsor_id)->get();
        $manager_sponsor = view('admin.sponsor.edit_sponsor')->with('edit_sponsor',$edit_sponsor)->with('cate_sponsor',$cate_sponsor);
        return view('admin_layout')->with('admin.sponsor.edit_sponsor',$manager_sponsor);
    }
    public function update_sponsor(Request $request,$sponsor_id){
        $this->check();
        $data = array();
        $data['sponsor_name'] = $request->sponsor_name;
        $data['sponsor_desc'] = $request->sponsor_desc;
        $data['category_id'] = $request->sponsor_cate;
        $get_image = $request->file('sponsor_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['sponsor_image'] = $new_image;
            DB::table('tbl_sponsor')->where('sponsor_id',$sponsor_id)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-sponsor');
        }
        DB::table('tbl_sponsor')->where('sponsor_id',$sponsor_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-sponsor');
    }
    public function delete_sponsor($sponsor_id){
        $this->check();
        DB::table('tbl_sponsor')->where('sponsor_id',$sponsor_id)->delete();
        return Redirect::to('all-sponsor');
    }
    //End Admin
    public function details_sponsor($sponsor_id){
        $cate_sponsor = DB::table('tbl_category')->where('category_status','0')->orderBy('category_id','desc')->get();
        $details_sponsor = DB::table('tbl_sponsor')
        ->join('tbl_category', 'tbl_sponsor.category_id', '=', 'tbl_category.category_id')->where('tbl_sponsor.sponsor_id',$sponsor_id)
         ->get();
        // foreach($show_sponsor as $key=>$show){
        //     $show_sponsor = $show->category_id;
        // }
        $related_sponsor = DB::table('tbl_sponsor')
        ->join('tbl_category', 'tbl_sponsor.category_id', '=', 'tbl_category.category_id')->where('tbl_sponsor.category_id',$sponsor_id)
         ->limit(4)->get();

        return view('pages.sponsor.show_sponsor')->with('category',$cate_sponsor)->with('show_sponsor',$details_sponsor)->with('related',$related_sponsor);

    }
}
