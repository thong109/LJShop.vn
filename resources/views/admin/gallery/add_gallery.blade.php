@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm thư viện ảnh
                        </header>
                        <form action="{{url('/insert-gallery/'.$pro_id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-3" align="right">

                            </div>
                            <div class="col-md-6" style="margin-top: 10px">
                                <input type="file" id="file" class="form-control" name="file[]" accept="image/*" multiple >
                                <span id="error_gallery"></span>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" name="upload" name="taianh" value="Tải ảnh" class="btn btn-success" style="margin-top: 10px">
                            </div>
                        </div>
                        </form>
                        <div class="panel-body">
                            <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
                            <form action="">
                                @csrf

                            <div id="gallery_load">
                                {{-- <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Tên hình ảnh</th>
                                        <th colspan="2">Hình ảnh</th>
                                        <th>Quản lý</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td colspan="2">john@example.com</td>
                                      </tr>
                                    </tbody>
                                  </table> --}}
                            </div>
                        </form>
                        </div>
                    </section>

            </div>
@endsection
