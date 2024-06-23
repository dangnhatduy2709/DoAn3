@extends('/AdminDottiesShoes/LayoutDotties/layout')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý đơn hàng</h1>
    
    </div>

    <div class="row">
        <div class="col-lg-12">
            
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <!-- <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6> -->
                    <a href="{{route ( 'admin.donhang.donhangdaxacnhan' )}}" class="m-12 btn btn-primary">Danh sách đơn hàng đã thanh toán</a>
                </div>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="{{route ( 'admin.donhang.donhangchuaxacnhan' )}}" class="m-12 btn btn-primary">Danh sách đơn hàng chưa thanh toán</a>

                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>                               
                                <th>Mã đơn hàng</th>
                                <th>Họ Tên</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Thành tiền</th>
                                <th>Ngày đặt hàng</th>
                                <th style="display: flex; margin: 0 auto;">Chức năng </th>
                                <th>Trạng thái</th>

                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach($dh as $dhs)
                                <tr>
                                    <td>{{$dhs -> id }}</td>
                                    <td>{{$dhs -> HoTen}}</td>
                                    <td>{{$dhs -> DiaChi}}</td>
                                    <td>{{$dhs -> Email}}</td>
                                    <td>{{$dhs -> SoDT}}</td>
                                    <td>{{number_format ($dhs -> thanhtien)}}</td>                               
                                    <td>{{$dhs -> created_at}}</td>
                                    <td>
                                        <a href="{{ route ('admin.donhang.chitietdonhang', $dhs -> id ) }}"  class="btn btn-warning" >
                                            <i class="fa fa-solid fa-eye"></i>

                                        </a>

                                    </td>
                                    <td>
                                        <button class="btn btn-success">
                                            {{$dhs -> trangthai}}    
    
                                        </button>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    <!--Row-->

    

</div>
@endsection