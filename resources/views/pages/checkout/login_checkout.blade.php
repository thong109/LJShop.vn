@extends('layout')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập vào tài khoản</h2>
                    <form action="{{URL::to('/login-customer')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="email" placeholder="Tài khoản" name="email_account"/>
                        <input type="password" placeholder="Mật khẩu" name="password_account"/>
                        <span>
                            <input type="checkbox" class="checkbox">
                            Ghi nhớ đăng nhập
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng kí tài khoản</h2>
                    <form action="{{URL::to('/add-customer')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Họ tên" name="customer_name"/>
                        <input type="email" placeholder="Địa chỉ email" name="customer_email"/>
                        <input type="password" placeholder="Mật khẩu" name="customer_password"/>
                        <input type="text" placeholder="Điện thoại" name="customer_phone">
                        <button type="submit" class="btn btn-default">Đăng kí</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
