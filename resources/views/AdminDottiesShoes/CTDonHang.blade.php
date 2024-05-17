@extends('/AdminDottiesShoes/LayoutDotties/layout')
@section('content')

@php
    $index=1;
@endphp

<div class="container-fluid">
    <div id="dvContainer1">
        <div class="row">
        <div class="col-md-6">
                <div class="text-dark text-bold">Tên người nhận</div>
                <div>{{$donhang->last_name}}</div>
            </div>
            <div class="col-md-6">
                <div class="text-dark text-bold">Địa chỉ</div>
                <div>{{$donhang->street_address}}</div>
            </div>
            <div class="col-md-6">
                <div class="text-dark text-bold">Số điện thoại</div>
                <div>{{$donhang->phone}}</div>
            </div>

            <div class="col-md-6">
                <div class="text-dark text-bold">Ngày đặt</div>
                <div>{{ $donhang->created_at }}</div>
            </div>
            <div class="col-md-6">
                <div class="text-dark text-bold">Trạng thái</div>
                <div>{{$donhang->payment_type}}</div>
            </div>

            <div class="col-md-6">
                <div class="text-dark text-bold">Ghi chú</div>
                <div>{{$donhang->notes}}</div>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chi Tiết Hóa Đơn</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        @foreach ($chitiet as $item)
                            <tr>
                                <td>{{$index ++}}</td>
                                <td>
                                    <img style="width: 110px;" src="/WebsiteDottiesShoes/img/Ues/{{$item -> sanpham -> HinhAnh}}"  />
                                </td>
                                <td>
                                    {{ $item -> sanpham ->TenSP }}
                                </td>
                                <td>
                                    {{ $item->qty }}
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    {{ number_format($item->total, 0, ',', '.')}}VNĐ
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection