@extends('/AdminDottiesShoes/LayoutDotties/layout')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý hóa đơn nhập</h1>
    
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn nhập</h6>
                <a href="{{route ('admin.hoadonnhap.create') }}" class="m-0 btn btn-primary">Thêm hóa đơn nhập</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã Hóa Đơn Nhập</th>
                                <th>Mã Nhà Cung Cấp</th>
                                <th>Tên Nhà Cung Cấp</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                                <th>Thành Tiền</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach($db as $hdn)
                                <tr>
                                    <td>{{$hdn -> idHDN}}</td>
                                    <td>{{$hdn -> idNCC}}</td>
                                    <td>{{$hdn -> tennhacungcap}}</td>
                                    <td>{{$hdn -> DiaChi}}</td>
                                    <td>{{$hdn -> SoDT}}</td>
                                    <td>{{number_format($hdn -> thanhtien)}}</td>
                                    <td>
                                        <a href="{{route ('admin.hoadonnhap.details', $hdn -> idHDN) }}" class="btn btn-sm btn-success" style="margin-right: 16px">
                                            <i class="fa fa-solid fa-eye"></i>

                                        </a>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    <!--Row-->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to logout?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <a href="login.html" class="btn btn-primary">Logout</a>
        </div>
        </div>
    </div>
    </div>

</div>
@endsection

