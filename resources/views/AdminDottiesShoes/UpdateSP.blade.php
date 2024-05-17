@extends('/AdminDottiesShoes/LayoutDotties/layout')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Sản Phẩm</h1>
    <br> 
    <div class="card">
        <div class="card-body">
            
            <form class="forms-sample" role="form" action="{{ route('UpdateSP',$product -> ID) }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="HinhAnh">Hình Ảnh :</label>
                    <input type="file" name="HinhAnh" id="HinhAnh" class="form-control"  value="{{$product -> HinhAnh}}">
                </div>
                <div class="form-group">
                    <label for="entercateid">Loại Sản Phẩm</label>
                    <select class="form-control" name="ID" id="ID">
                        <option value="" name="ID" selected> -- Chọn loại sản phẩm --</option>
                        @foreach($loaisanpham as $loaisanphams)
                        <option name="ID" value="{{ $loaisanphams->ID }}" >{{ $loaisanphams->TenLoai }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="entercateid">Nhà Sản Xuất</label>
                    <select class="form-control" name="ID" id="ID">
                        <option value="" name="ID" selected> -- Chọn nhà sản xuất --</option>
                        @foreach($nhasanxuat as $nhasanxuats)
                        <option name="ID" value="{{ $nhasanxuats->ID }}" >{{ $nhasanxuats->TenNCC }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" >
            <label style="font-size: 14px" for="exampleInputEmail1">Tên Sản Phẩm</label>
            <input  style="font-size: 14px" class="form-control form-control-lg mb-3" type="text"  name="TenSP" value="{{$product -> TenSP}}">
        </div>
                <div class="form-group">
                    <label for="MauSac">Màu Sắc :</label>
                    <input type="text" class="form-control" name="MauSac" id="MauSac" value="{{$product -> MauSac}}">
                </div>
                <div class="form-group">
                    <label for="DonGia">Đơn Giá :</label>
                    <input type="number"  class="form-control" name="DonGia" id="DonGia" value="{{$product -> DonGia}}">
                </div>
                <div class="form-group">
                    <label for="GiaSale">Giá Sale :</label>
                    <input type="number"  class="form-control" name="GiaSale" id="GiaSale" value="{{$product -> GiaSale}}">
                </div>
                <div class="form-group">
                    <label for="GhiChu">Ghi Chú :</label>
                    <input type="text" class="form-control" name="GhiChu" id="GhiChu" value="{{$product -> GhiChu}}">
                </div>
                <div class="form-group">
                    <label for="SoLuong">Số Lượng :</label>
                    <input type="number"  class="form-control" name="SoLuong" id="SoLuong" value="{{$product -> SoLuong}}">
                </div>
                <div class="form-group">
                    <label for="KichThuoc">Kích Thước :</label>
                    <input type="text" class="form-control" name="KichThuoc" id="KichThuoc" value="{{$product -> KichThuoc}}">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Cập Nhập</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
    <br> <br>
</div>
@endsection