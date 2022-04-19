@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh sách mua hàng
      </div>
      <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
    ?>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Stt</th>
              <th>Mã đơn hàng</th>
              <th>Ngày đặt hàng</th>
              <th>Tình trạng đơn hàng</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @php
                  $i = 1;
              @endphp
              @foreach($order as $key => $or)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$i++}}</td>
              <td>{{$or ->order_code}}</td>
              <td>{{$or ->created_at}}</td>
              <td>
                @if ($or->order_status==1)
                    Đơn hàng mới
                @else
                    Đã xong
                @endif

              </td>
              <td>
                <a href="{{URL::to('/view-order/'.$or->order_code)}}" class="active" ui-toggle-class=""><i class="fa fa-eye text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có muốn xóa?')" href="{{URL::to('/delete-order/'.$or->order_code)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
