@extends('/AdminDottiesShoes/LayoutDotties/layout')

@section('content')
<div class="col-lg-12">
    <!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Thêm hóa đơn nhập</h6>
        </div>
        <div class="card-body">
            <form action="{{ route ('admin.hoadonnhap.store') }}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="">Nhà cung cấp</label>
                    <select class ="form-control" name ="manhacungcap">
                        <option value="">Nhà Cung Cấp</option>

                        @foreach($ncc as  $ncc)
                            <option value="{{$ncc -> id}}">{{$ncc -> tennhacungcap}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <select class ="form-control" name="masanpham">
                        <option value="">Tên Sản Phẩm</option>
                        @foreach($sp as  $itemsp)
                            <option value="{{$itemsp -> ID}}">{{$itemsp -> TenSP}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Tên Kho</label>
                    <select class ="form-control" name="makho">
                        <option value="">Tên Kho</option>
                        @foreach($kho as  $kho)
                            <option value="{{$kho -> id}}">{{$kho -> tenkho}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="">Đơn Giá</label>
                    <input type="number" class="form-control" id="dongia" name="dongia" oninput="tinhThanhTien()"
                    placeholder="Nhập Giá">
                </div>
                <div class="form-group">
                    <label for="">Số Lượng</label>
                    <input type="number" class="form-control" id="soluong" name="soluong" oninput="tinhThanhTien()"
                    placeholder="Nhập Số Lượng">
                </div>
                <div class="form-group">
                    <label for="">Thành Tiền</label>
                    <input type="number" class="form-control" id="thanhtien" name="thanhtien" >
                </div>
                


                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('ckeditor_footer')
    <script>
        function tinhThanhTien() {
            let soLuong = document.getElementById("soluong").value;
            let donGia = document.getElementById("dongia").value;
            let thanhTien = soLuong * donGia;
            document.getElementById("thanhtien").value = thanhTien;
    }
    </script>
@endpush