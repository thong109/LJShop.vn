@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          Chỉnh sửa danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            {{-- @foreach ($edit_category as $key => $edit_cate)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('update-category/'.$edit_cate->category_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" value="{{$edit_cate->category_name}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <input style="resize: none" rows="5" class="form-control" id="exampleInputPassword1" value="{{$edit_cate->category_desc}}" name="category_desc">

                                </div>
                                <button type="submit" name="update_category" class="btn btn-info">Lưu</button>
                            </form>
                            </div>
                            @endforeach --}}

                            <div class="position-center">
                                <form role="form" action="{{URL::to('update-category/'.$edit_category->category_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_name" class="form-control" id="name" value="{{$edit_category->category_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="category_slug" class="form-control" id="slug"  value="{{$edit_category->category_slug}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" class="form-control" id="ckeditor_desc" name="category_desc">
                                    </textarea>
                                </div>
                                <button type="submit" name="update_category" class="btn btn-info">Lưu</button>
                            </form>
                            </div>
                        </div>
                    </section>

            </div>
@endsection
