@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         Cập nhật hoạt động
                        </header>
                        <div class="panel-body">
                            @foreach ($edit_activity as $key => $edit_acti)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('update-activity/'.$edit_acti->activity_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn danh mục</label>
                                        <select name="activity_cate" class="form-control input-lg m-bot15">
                                            @foreach ($cate_activity as $key => $cate)
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="activity_name" class="form-control" id="exampleInputEmail1" value="{{$edit_acti->activity_name}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh hoạt động</label>
                                    <input type="file" name="activity_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/product/'.$edit_acti->activity_image)}}" alt="" height="100px" width="100px" style="margin-top: 10px">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả hoạt động</label>
                                    <input style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" name="activity_desc" value="{{$edit_acti->activity_desc}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="activity_status" class="form-control input-lg m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <button type="submit" name="update_activity" class="btn btn-info">Lưu</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection
