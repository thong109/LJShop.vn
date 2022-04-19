<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExports;
use App\Exports\WordImport as ExportsWordImport;
use App\Imports\ProductImports;
use App\Imports\WordImport;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;
use App\Models\Comment;
use App\Models\Rating;

// session_start();

class ProductController extends Controller
{
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product()
    {
        $this->check();
        $cate_product = Category::orderBy('category_id','desc')->get();
        return view('admin.product.add_product')->with('cate_product',$cate_product);
    }
    public function all_product()
    {
        $this->check();
        $all_product = Product::join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')->orderBy('tbl_product.product_id','desc')
         ->get();
        $manager_product = view('admin.product.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.product.all_product',$manager_product);
    }
    public function save_product(Request $request)
    {
        $this->check();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['product_desc'] = $request->product_desc;
        $data['product_tags'] = $request->product_tags;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_cost'] = $request->product_cost;
        $data['product_sold'] = 0;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $data['product_sale'] = $request->product_sale;
        // if($data['product_sale'] = $request->product_sale){
        //     $request->product_price = $request->product_price -  ($request->product_price*$request->product_sale)/100;
        // }
        $get_image = $request->file('product_image');
        $path = 'public/uploads/product/';
        $path_gal = 'public/uploads/gallery/';
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            File::copy($path.$new_image,$path_gal.$new_image);
            $data['product_image'] = $new_image;

        }
        // $data['product_image'] = '';
        // DB::table('tbl_product')->insert($data);
        // Session::put('message','Thêm thành công');
        // return Redirect::to('all-product');
            $pro_id = Product::insertGetId($data);
            $gallery = new Gallery();
            $gallery->gallery_image = $new_image;
            $gallery->gallery_name = $new_image;
            $gallery->product_id = $pro_id;
            $gallery->save();
            Session::put('message','Thêm thành công');
            return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
        $this->check();
        Product::where('product_id',$product_id)->update(['product_status'=>1]);
        return Redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->check();
        Product::where('product_id',$product_id)->update(['product_status'=>0]);
        return Redirect::to('all-product');
    }

    //
    public function edit_product($product_id){
        $this->check();
        $cate_product = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $edit_product = Product::where('product_id',$product_id)->get();
        $manager_product = view('admin.product.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);
        return view('admin_layout')->with('admin.product.edit_product',$manager_product);
    }
    public function update_product(Request $request,$product_id){
        $this->check();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_tags'] = $request->product_tags;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_cost'] = $request->product_cost;
        $data['category_id'] = $request->product_cate;
        $data['product_sale'] = $request->product_sale;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            Product::where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-product');
        }
        Product::where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->check();
        Product::where('product_id',$product_id)->delete();
        return Redirect::to('all-product');
    }
    //End Admin
    public function details_product($product_slug,Request $request){
        $cate_product = Category::where('category_status','0')->orderBy('category_id','desc')->get();
        $details_product = Product::join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')->where('tbl_product.product_slug',$product_slug)
         ->get();
        foreach ($details_product as $key ) {
            $category_id = $key->category_id;
            $meta_desc = $key->product_desc;
            $meta_keywords = $key->product_slug;
            $meta_title = "JLShop.vn".' | '.$key->product_slug;
            $url_canonical = $request->url();
            $product_id = $key->product_id;
        }
        //update views product
        $product = Product::where('product_slug',$product_slug)->first();
        $product->product_views = $product->product_views + 1;
        $product->save();
        // gallery
        $gallery = Gallery::where('product_id',$product_id)->get();
        $related_product = Product::join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.category_id')->where('tbl_product.category_id',$category_id)->whereNotIn('tbl_product.product_slug',[$product_slug])->limit(6)
         ->get();
         $rating = Rating::where('product_id',$product_id)->avg('rating');
         $rating = number_format($rating, 2, '.', '');
         if($category_id != ''){
            return view('pages.product.show_product')->with('category',$cate_product)->with('show_product',$details_product)->with('related_product',$related_product)->with(compact('meta_keywords','gallery','meta_desc','meta_title','url_canonical','rating','product'));
        }else{
            return view('pages.error');
        }

    }
    public function export_product(){
        return Excel::download(new ProductExports ,'product_product.xlsx');
    }
    public function import_product(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ProductImports, $path);
        return back();
    }
    public function import_word(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExportsWordImport, $path);
        return back();
    }
    public function quickview(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $gallery = Gallery::where('product_id',$product_id)->get();
        $output['product_gallery'] = '';
        foreach($gallery as $key => $gal){
            $output['product_gallery'].='<p><img width="100%" src="public/uploads/gallery/'.$gal->gallery_image.'"></p>';
        }
        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
        $output['product_tags'] = $product->product_tags;
        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price);
        $output['product_image'] = '<p><img width="100%" src="public/uploads/gallery/'.$gal->gallery_image.'"></p>';

        $output['product_button'] = '<input type="button" value="Mua ngay" class="btn btn-default add-to-cart-quickview" id="buy_quickview" data-id_product="'.$product->product_id.'" name="add-to-cart">
        ';
        $output['product_quickview_value'] = '
        <input type="hidden" value="'.$product->product_id.'" class="cart_product_id_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_name.'" class="cart_product_name_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_image.'" class="cart_product_image_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_quantity.'" class="cart_product_quantity_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_price.'" class="cart_product_price_'.$product->product_id.'">
        <input type="hidden" value="1" class="cart_product_qty_'.$product->product_id.'">';
        echo json_encode($output);
    }
    public function tag(Request $request, $product_tags){
        $meta_desc = "Chuyên bán máy ảnh và phụ kiện máy ảnh";
        $meta_keywords = "may anh, máy ảnh, phụ kiện,phu kien, phụ kiện máy ảnh, phu kien may anh";
        $meta_title = "LJShop.vn | Tìm kiếm tags";
        $url_canonical = $request->url();
        $cate_product = Category::where('category_status','0')->orderBy('category_id','desc')->get();
        $tag = str_replace("."," ",$product_tags);
        $product_tag = Product::where('product_status',0)->where('product_name','like','%'.$tag.'%')
        ->orWhere('product_tags','like','%'.$tag.'%')
        ->orWhere('product_slug','like','%'.$tag.'%')
        ->get();
        return view('pages.product.tag')->with(compact('cate_product','meta_desc','meta_keywords','meta_title','url_canonical','product_tags','product_tag'));
    }
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)
        // ->where('comment_parent_comment',null)
        ->get();
        $output = '';
        foreach($comment as $key => $comment){
                $output.= '
                <div class="row style_comment">
                    <div class="col-md-2">
                        <img src="public/fronent/images/" alt="">
                    </div>
                    <div class="col-md-10">
                        <p style="color: blue">'.$comment->comment_name.'</p>
                        <p>'.$comment->comment.'</p>
                    </div>
                </div>
                <p></p>
                ';
                if($comment->comment_parent_comment != null){
                    $output.='
                    <div class="row comment_reply style_comment">
                    <div class="col-md-2">
                        <img src="public/fronent/images/" alt="">
                    </div>
                    <div class="col-md-10">
                        <p style="color: blue">'.$comment->comment_name.'</p>
                        <p>'.$comment->comment.'</p>
                    </div>
                </div>
                <p></p>
                    ';
                }
        }
        echo $output;

    }
    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->save();
    }
    //Admin
    public function list_comment(){
        $this->check();
        $comment = Comment::with('product')
        ->OrderBy('comment_date','desc')
        ->where('comment_parent_comment',null)
        ->get();
        return view('admin.comment.list_comment')->with(compact('comment'));
    }
    // public function delete_comment($comment_id){
    //     $comment = Comment::findOrFail($comment_id);
    //     $result = $comment->delete();
    //     if($result){
    //         Session::put('message','Xóa mã giảm giá thành công');
    //         return Redirect::to('list-comment');
    //     }else{
    //         Session::put('message','Xóa mã giảm giá thất bại');
    //         return Redirect::to('list-comment');
    //     }
    // }
    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_name = "LJShop.vn";
        $comment->save();
    }
    // public function allow_comment(Request $request){
    //     $data = $request->all();
    //     $comment = Comment::find($data['comment_id']);
    //     $comment->comment_status = $data['comment_status'];
    //     $comment->save();
    // }
    public function insert_rating(Request $request){
        $data = $request->all();
        $rating =new Rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo 'done';
    }
}
