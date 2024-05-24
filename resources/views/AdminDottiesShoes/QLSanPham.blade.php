@extends('/AdminDottiesShoes/LayoutDotties/layout')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Sản Phẩm</h6>
            <br>
            <span><a href="{{route('CreateSP')}}"> Thêm Mới</a></span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            @if(Session::has('ThongBao'))
                <div class="alert alert-success">{{ Session::get('ThongBao') }}</div>
            @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Loại Sản Phẩm</th>
                            <th>Nhà Sản Xuất</th>
                            <th>Màu Sắc</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th style="width: 30.3333px;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $products)
                        <tr>
                            <td>{{++$i}}</td>
                            <td><img src="/WebsiteDottiesShoes/img/Ues/{{$products->HinhAnh}}" style="width:90px" ></td>
                            <td>{{$products->TenSP}}</td>
                            <td>{{$products->TenLoai}}</td>
                            <td>{{$products->TenNCC}}</td>
                            <td>{{$products->MauSac}}</td>
                            <td>{{number_format($products->DonGia)}} VND</td>
                            <td>{{$products->SoLuong}}</td>
                            <td>
                                <form action="{{ route('deletesp',$products->ID)}}"  method="post">
                                    <a href="{{ route('EditSP',['ID'=>$products->ID])}}"><i class="text-warning fa-solid fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; outline: none"><i class="text-danger fa-solid fa-trash"></i></button>
                                </form>
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