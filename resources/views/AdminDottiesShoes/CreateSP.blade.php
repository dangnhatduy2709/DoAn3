@extends('/AdminDottiesShoes/LayoutDotties/layout')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm Sản Phẩm</h1>
    <br> 
    <div class="card">
        <div class="card-body">
            
            <form class="forms-sample" role="form" action="{{ route('StoreSP') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label>Hình Ảnh :</label>
                    <input type="file" name="HinhAnh" id="HinhAnh" class="form-control">
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
                <div class="form-group">
                    <label for="TenSP">Tên Sản Phẩm :</label>
                    <input type="text" class="form-control" name="TenSP" id="TenSP" placeholder=" ......">
                </div>
                <div class="form-group">
                    <label for="MauSac">Màu Sắc :</label>
                    <input type="text" class="form-control" name="MauSac" id="MauSac" placeholder="......">
                </div>
                <div class="form-group">
                    <label for="DonGia">Đơn Giá :</label>
                    <input type="number" value="0" class="form-control" name="DonGia" id="DonGia" placeholder="......">
                </div>
                <div class="form-group">
                    <label for="GiaSale">Giá Sale :</label>
                    <input type="number" value="0" class="form-control" name="GiaSale" id="GiaSale" placeholder="......">
                </div>
                <div class="form-group">
                    <label for="GhiChu">Ghi Chú :</label>
                    <input type="text" class="form-control" name="GhiChu" id="GhiChu" placeholder="......">
                </div>
                <div class="form-group">
                    <label for="SoLuong">Số Lượng :</label>
                    <input type="number" value="0" class="form-control" name="SoLuong" id="SoLuong" placeholder="......">
                </div>
                <div class="form-group">
                    <label for="KichThuoc">Kích Thước :</label>
                    <input type="text" class="form-control" name="KichThuoc" id="KichThuoc" placeholder="......">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
    <br> <br>
</div>
@endsection