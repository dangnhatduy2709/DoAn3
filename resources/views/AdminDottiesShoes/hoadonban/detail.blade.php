@extends('/AdminDottiesShoes/LayoutDotties/layout')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chi tiết hóa đơn bán</h1>
    
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <!-- <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6> -->
                    <a href="{{route ( 'admin.hoadonban.index' )}}" class="m-12 btn btn-primary">Trở lại</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                            
                                <th>Mã chi tiết đơn hàng</th>
                                <th>Mã đơn hàng</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Ảnh</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach($chitiet as $item)
                                <tr>
                                    <td>{{$item -> id }}</td>
                                    <td>{{$item -> mahoadonban}}</td>
                                    <td>{{$item -> masanpham }}</td>
                                    <td>{{$item -> TenSP}}</td>
                                    <td>{{$item -> soluong}}</td>
                                    <td>{{number_format ($item -> thanhtien)}}đ</td>
                                    <td>
                                        <img src="/upload/{{$item -> HinhAnh}}" style="width: 100px; height: 100px;" alt="">
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