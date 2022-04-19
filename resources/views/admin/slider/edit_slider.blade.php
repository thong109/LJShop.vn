@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         Cập nhật tin tức
                        </header>
                        <div class="panel-body">
                            @foreach ($edit_slider as $key => $edit_pro)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('update-slider/'.$edit_pro->slider_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn danh mục</label>
                                        <select name="slider_cate" class="form-control input-lg m-bot15">
                                            @foreach ($cate_slider as $key => $cate)
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" value="{{$edit_pro->slider_name}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh tin tức</label>
                                    <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/product/'.$edit_pro->slider_image)}}" alt="" height="100px" width="100px" style="margin-top: 10px">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả tin tức</label>
                                    <input style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" name="slider_desc" value="{{$edit_pro->slider_desc}}">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="slider_status" class="form-control input-lg m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <button type="submit" name="update_slider" class="btn btn-info">Lưu</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection
