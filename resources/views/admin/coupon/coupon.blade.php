@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mã giảm giá
                        </header>
                        <?php
                            $message = Session::get('message');
                                if($message) {
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('save-coupon')}}" method="POST">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input type="text" name="coupon_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mã giả giá</label>
                                    <input type="text" style="resize: none" rows="5" class="form-control" name="coupon_code">
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6" style="padding-left: 0">
                                        <label for="exampleInputPassword1">Ngày bắt đầu</label>
                                        <input type="date" style="resize: none" rows="5" class="form-control" name="coupon_date_start">
                                    </div>
                                    <div class="col-md-6" style="padding: 0">
                                        <label for="exampleInputPassword1">Ngày kết thúc</label>
                                        <input type="date" style="resize: none" rows="5" class="form-control" name="coupon_date_end">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" name="coupon_times" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tính năng mã</label>
                                    <select name="coupon_condition" class="form-control input-lg m-bot15">
                                        <option value="0">-----Chọn-----</option>
                                        <option value="1">Giảm theo %</option>
                                        <option value="2">Giảm theo tiền</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nhập % hoặc tiền giảm</label>
                                    <input type="text" name="coupon_number" class="form-control">
                                </div>
                                <button type="submit" name="add_coupon" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
