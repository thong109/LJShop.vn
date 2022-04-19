<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Gallery;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Social;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }

    }
    public function add_gallery($product_id){
        $pro_id = $product_id;
        return view('admin.gallery.add_gallery')->with(compact('pro_id'));
    }
    public function select_gallery(Request $request){
        $product_id = $request->pro_id;
        $gallery = Gallery::where('product_id',$product_id)->get();
        $gallery_count = $gallery->count();
        $output = '
        <table class="table">
        <thead>
        <form>
                    '.csrf_field().'
          <tr>
            <th>STT</th>
            <th>Tên hình ảnh</th>
            <th colspan="">Hình ảnh</th>
            <th>Quản lý</th>
          </tr>
        </thead>
        <tbody>
        ';
        if($gallery_count>0){
            $i = 0;
            foreach($gallery as $key){
                $i++;
                $output.='

                <tr>
                    <td>'.$i.'</td>
                    <td contenteditable class="edit-gal" data-gal_id="'.$key->gallery_id.'">'.$key->gallery_name.'</td>
                    <td class="galle"><img src="'.url('public/uploads/gallery/'.$key->gallery_image).'">
                    <input type="file" class="file_image" width="40%" data-gal_id="'.$key->gallery_id.'" id="file-'.$key->gallery_id.'" name="file" accept="image/*" style="margin-top:10px">
                    </td>
                    <td>
                    <button type="button" data-gal_id="'.$key->gallery_id.'" class="btn btn-danger delete-gallery">Xóa</button>
                    </td>
                </tr>
                ';
            }
        }else{
            $output .='
            <tr>
                <td colspan="5" class="text-center">Chưa có ảnh để hiển thị</td>
            </tr>
            ';
            $output .='
            </tbody>
            </table>
            </form>
            ';
        }
        echo $output;
    }
    public function insert_gallery(Request $request,$pro_id){
        $get_image = $request->file('file');
        if($get_image){
            foreach($get_image as $key){
                $get_name_image = $key->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$key->getClientOriginalExtension();
                $key->move('public/uploads/gallery',$new_image);
                $gallery = new Gallery();
                $gallery->gallery_name =  $new_image;
                $gallery->gallery_image = $new_image;
                $gallery->product_id =  $pro_id;
                $gallery->save();
            }
        }
                Session::put('message','Thêm thành công');
                return redirect()->back();
    }
    public function update_gallery(Request $request){
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;
        $gallery = Gallery::find($gal_id);
        $gallery->gallery_name =  $gal_text;
        $gallery->save();
    }
    public function delete_gallery(Request $request){
        $gal_id = $request->gal_id;
        $gallery = Gallery::find($gal_id);
        $gallery->delete();
    }
    public function update_gallery_image(Request $request){
        $get_image = $request->file('file');
        $gal_id = $request->gal_id;
        if($get_image){
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/gallery',$new_image);
                $gallery = Gallery::find($gal_id);
                $gallery->gallery_image = $new_image;
                $gallery->save();
        }
    }
}
