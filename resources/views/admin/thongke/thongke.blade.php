@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <p class="text-center">Thống kê doanh số</p>
        <form action="" autocomplete="off">
            @csrf
            <div class="col-md-2">
                <p>Từ ngày: <input type="date" id="datepicker" class="form-control"></p>
                <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
            </div>
            <div class="col-md-2">
                <p>Đến ngày: <input type="date" id="datepicker2" class="form-control"></p>
            </div>
            <div class="col-md-2">
                <p>
                    Lọc theo:
                    <select class="dashboard-filter form-control" id="">
                        <option>--Chọn--</option>
                        <option value="7ngay">7 ngày</option>
                        <option value="thangtruoc">Tháng trước</option>
                        <option value="thangnay">Tháng này</option>
                        <option value="365ngayqua">365 ngày</option>
                    </select>
                </p>
            </div>
        </form>
        <div class="col-md-12">
            <div id="chart" style="height:250px"></div>
        </div>
    </div>
    <div class="row">
        <p class="text-center mb-3">Thống kê truy cập</p>
        <table class="table table-dark" style="background: black;margin-top:15px">
            <thead>
                <tr>
                    <th scope="col">Đang online</th>
                    <th scope="col">Tổng tháng trước</th>
                    <th scope="col">Tổng tháng này</th>
                    <th scope="col">Tổng một năm</th>
                    <th scope="col">Tổng truy cập</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="center">{{ $visitor_count }}</td>
                    <td class="center">{{ $visitor_last_month_count }}</td>
                    <td class="center">{{ $visitor_this_month_count }}</td>
                    <td class="center">{{ $visitor_of_year_count }}</td>
                    <td class="center">{{ $visitor_total }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <p class="text-center mb-3">Thống kê tổng sản phẩm đơn hàng</p>
            <div id="donut" style="height:250px"></div>
        </div>
        <div class="col-md-5 col-xs-12">
            <p class="text-center mb-3">Sản phẩm xem nhiều</p>
            <ol>
                @foreach ($product_views as $key)
                    <li style="display: flex;display: list-item;list-style-position: inside;">
                        <a style="color: #000" href="{{ URL::to('chi-tiet-san-pham/' . $key->product_slug) }}"
                            target="_blank">{{ $key->product_name }}</a> | <span
                            style="color: red">{{ $key->product_views }}</span>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection
