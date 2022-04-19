@extends('layout')
@section('content')
<section class="news-letter" id="dangki" >
              <div class="container">
                <div class="heading light-head text-center margin-bottom-30">
                  <h4 style="text-align: center;">Đăng ký</h4>
                  <div style="border-bottom: 1px solid white;"></div>
                  <span style="margin-top: 10px">Đăng ký với chúng tôi nếu bạn muốn học</span> </div>
                <form method="POST" role="form">
                    @csrf
                    @method('POST')
                  <input type="text" name="name" id="name" placeholder="Full name" style="margin-bottom: 10px  ;">
                  <input type="email" placeholder="Enter your email address" name="email" id="email" ><br>
                  <div class="send"><input type="submit" value="send" name="btn" class="send"></div>
                </form>
              </div>
            </section>
            @endsection


