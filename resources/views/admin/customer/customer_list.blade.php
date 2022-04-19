@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê nhà tài trợ
      </div>
      <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
    ?>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light" id="myTable-1">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên khách hàng</th>
              <th>Email</th>
              <th>Số điện thoại</th>
              <th>Vip</th>
            </tr>
          </thead>

          <tbody>
              @foreach($customer as $key => $coup)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$coup ->customer_name}}</td>
              <td>{{$coup ->customer_email}}</td>
              <td>{{$coup ->customer_phone}}</td>
              <td><span class="text-ellipsis">
                <?php
                    if($coup->customer_vip==1){
                ?>
                    <a href="{{URL::to('/unactive-cus/'.$coup->customer_id)}}"><span class="vip-vip">Vip</span></a>
                    <?php
                    }else{
                    ?>
                        <a href="{{URL::to('/active-cus/'.$coup->customer_id)}}"><span class="vip">Vip</span></a>
                    <?php
                    }
                 ?>
                </span></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
