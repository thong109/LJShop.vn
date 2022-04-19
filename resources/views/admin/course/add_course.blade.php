@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm course
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('save-course')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn danh mục</label>
                                    <select name="course_cate" class="form-control input-lg m-bot15">
                                        @foreach ($cate_course as $key => $cate)
                                        @if($cate->category_id==$cate->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên course</label>
                                    <input type="text" name="course_name" class="form-control" id="exampleInputEmail1" placeholder="Tên course">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh course</label>
                                    <input type="file" name="course_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả course</label>
                                    <input class="form-control" id="exampleInputPassword1" placeholder="Mô tả course" name="course_desc">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="course_status" class="form-control input-lg m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>

                                <button type="submit" name="add_course" class="btn btn-info">Lưu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
