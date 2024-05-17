@extends('/AdminDottiesShoes/LayoutDotties/layout')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">QL Đơn Hàng</h1>
    <p> Thêm Mới</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Hóa Đơn</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Khách Hàng</th>
                            <th>Địa Chỉ</th>
                            <th>Số ĐT</th>
                            <th>Trạng Thái</th>
                            <th>Ghi Chú</th>
                            <th>Thanh Toán</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hoadon as $hoadons)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$hoadons->last_name}}</td>
                            <td>{{$hoadons->street_address}}</td>
                            <td>{{$hoadons->phone}}</td>
                            <td>{{$hoadons->email}}</td>
                            <td>{{$hoadons->notes}}</td>
                            <td>{{$hoadons->payment_type}}</td>                          
                            <td>
                                <a href=""><i class="text-warning fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('CTDonHang', $hoadons->id)}}"><i class="fa-solid fa-circle-info"></i></a>
                                <a href=""><i class="text-danger fa-solid fa-trash"></i></a>
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