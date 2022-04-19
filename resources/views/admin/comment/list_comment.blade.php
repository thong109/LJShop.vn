@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê bình luận
      </div>
      <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
    ?>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light" id="myTable">
          <thead>
            <tr>
              <th style="width:20px;">Trạng thái</th>
              <th>Người bình luận</th>
              <th>Bình luận</th>
              <th>Ngày bình luận</th>
              <th>Sản phẩm bình luận</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach($comment as $key => $comment)
            <tr>
              <td><input type="checkbox"></td>
              {{-- <td>
                    @if ($comment->comment_status == 1)
                <input type="button" data-comment_status="0" data-comment_id="{{$comment->comment_id}}" id="{{$comment->comment_product_id}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt">
                    @else
                <input type="button" data-comment_status="1" data-comment_id="{{$comment->comment_id}}" id="{{$comment->comment_product_id}}" class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ duyệt">
                    @endif
              </td> --}}
              <td>{{$comment->comment_name}}</td>
              <td>{{$comment->comment}}
                <ul>
                    @foreach ($comment as $key => $comment_reply)
                        @if ($comment->comment_parent_comment == $comment->comment_id)
                            <li>{{$comment->comment}}</li>
                        @endif
                  @endforeach
                </ul>
                <br><input rows="1" class="reply_comment_{{$comment->comment_id}} form-control">
                <br><button class="btn btn-default btn-xs btn-reply-comment" data-comment_id="{{$comment->comment_id}}" data-product_id="{{$comment->comment_product_id}}">Trả lời</button>
            </td>
            <div id="notify_comment"></div>
              <td>{{$comment->comment_date}}</td>
              <td><a href="{{URL::to('chi-tiet-san-pham/'.$comment->product->product_slug)}}" target="_blank">{{$comment->product->product_name}}</a></td>
              <td>
                <a onclick="return confirm('Bạn có muốn xóa?')" href="{{URL::to('/delete-comment/'.$comment->comment_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

@endsection
