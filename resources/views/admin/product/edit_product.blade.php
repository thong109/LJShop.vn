@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         Cập nhật tin tức
                        </header>
                        <div class="panel-body">
                            @foreach ($edit_product as $key => $edit_pro)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('update-product/'.$edit_pro->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn danh mục</label>
                                        <select name="product_cate" class="form-control input-lg m-bot15">
                                            @foreach ($cate_product as $key => $cate)
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tin tức</label>
                                    <input type="text" name="product_name" class="form-control" id="name" value="{{$edit_pro->product_name}}" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh tin tức</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/product/'.$edit_pro->product_image)}}" alt="" height="100px" width="100px" style="margin-top: 10px">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="number" name="product_quantity" class="form-control" id="exampleInputEmail1" min="0" oninput="this.value = Math.abs(this.value)" value="{{$edit_pro->product_quantity}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="number" name="product_price" class="form-control money_format" id="exampleInputEmail1" min="0" oninput="this.value = Math.abs(this.value)" value="{{$edit_pro->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá gốc</label>
                                    <input type="number" name="product_cost" class="form-control money_format" id="exampleInputEmail1" min="0" oninput="this.value = Math.abs(this.value)" value="{{$edit_pro->product_cost}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Khuyến mãi (%)</label>
                                    <input type="number" name="product_sale" class="form-control" id="exampleInputEmail1" min="0" oninput="this.value = Math.abs(this.value)" value="{{$edit_pro->product_sale}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả tin tức</label>
                                    <textarea style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" name="product_desc" value="{{$edit_pro->product_desc}}"></textarea>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung tin tức</label>
                                    <input style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" value="{{$edit_pro->product_content}}" name="product_content">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tags sản phẩm</label>
                                    <input type="text" data-role="tagsinput" class="form-control" id="exampleInputPassword1" value="{{$edit_pro->product_tags}}" name="product_tags">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-lg m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <button type="submit" name="update_product" class="btn btn-info">Lưu</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>

@endsection
