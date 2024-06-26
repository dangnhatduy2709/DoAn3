@extends('/AdminDottiesShoes/LayoutDotties/layout')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý kho</h1>
    
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách kho</h6>
                <!-- <a href="" class="m-0 font-weight-bold text-primary">Thêm loại sản phẩm</a> -->

                </div>
               
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã Kho</th>
                                <th>Tên Kho</th>
                                <th>Địa Chỉ</th>
                                <th>Tên sản phẩm</th>
                                <th>Số Lượng</th>
                                <th>Ảnh</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach($kho as $kho)
                                <tr>
                                    <td>{{$kho -> id }}</td>
                                    <td>{{$kho -> tenkho}}</td>
                                    <td>{{$kho -> diachi}}</td>
                                    <td>{{$kho -> TenSP}}</td>
                                    <td>{{$kho -> soluong}}</td>
                                    <td>
                                        <img src="/upload/{{$kho -> HinhAnh}}" style="width: 100px; height: 100px " alt="">
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


