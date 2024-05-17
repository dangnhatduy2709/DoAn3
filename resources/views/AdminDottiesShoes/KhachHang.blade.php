@extends('/AdminDottiesShoes/LayoutDotties/layout')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Khách Hàng</h6>
            <br>
            <span><a href="{{route('CreateSP')}}"> Thêm Mới</a></span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Khách Hàng</th>
                            <th>Địa Chỉ</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($khachhang as $khachhangs )
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$khachhangs -> HoTen}}</td>
                                <td>{{$khachhangs -> DiaChi}}</td>
                                <td>{{$khachhangs -> Email}}</td>
                                <td>{{$khachhangs -> SoDT}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection