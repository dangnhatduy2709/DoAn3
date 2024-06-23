@extends('/AdminDottiesShoes/LayoutDotties/layout')
@section('content')

@php
    $index = 1;
@endphp

<div class="container-fluid">
    <div id="dvContainer1">
        <div class="row">
            <div class="col-md-6">
                <div class="text-dark text-bold">Tên người nhận</div>
                <div>{{$dh->HoTen}}</div>
            </div>
            <div class="col-md-6">
                <div class="text-dark text-bold">Địa chỉ</div>
                <div>{{$dh->DiaChi}}</div>
            </div>
            <div class="col-md-6">
                <div class="text-dark text-bold">Số điện thoại</div>
                <div>{{$dh->SoDT}}</div>
            </div>
            <div class="col-md-6">
                <div class="text-dark text-bold">Ngày đặt</div>
                <div>{{ $dh->created_at }}</div>
            </div>
            <div class="col-md-6">
                <div class="text-dark text-bold">Trạng thái</div>
                <div>{{$dh->trangthai}}</div>
            </div>

        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Chi Tiết Hóa Đơn</h6>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Ngày Đặt</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ctdh as $item)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>
                                    <img style="width: 110px;" src="/upload/{{$item->HinhAnh}}" />
                                </td>
                                <td>{{ $item->TenSP }}</td>
                                <td>{{ $item->soluong }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ number_format($item->thanhtien, 0, ',', '.') }} VNĐ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
