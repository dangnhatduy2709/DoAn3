@extends('/AdminDottiesShoes/LayoutDotties/layout')

@php
    $index = 1;

@endphp

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống kê doanh thu</h1>
    
    </div>

    <div class="row">
        <div class="col-lg-12">
            
            <div class="card mb-4">
                            
                <div class="col-xs-12" style="display: flex; padding-top: 30px;" >
                    <div class="col-md-6">
                        <form action="{{ route ('admin.thongke.theothang')}}" method="post">
                            @csrf
                            <div class="col-md-8">
                                <input class="form-control" name="thang" type="number" min="1" max ="12" placeholder="Nhập tháng:" />
                                <input type="number" class="form-control" name="nam"  placeholder="Nhập năm:" style="margin-top: 30px">
                            </div>
                            <div class="col-md-4">
                                <button type="submit"  class="btn btn-success" style="margin-top: 12px;">Thống kê</button>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-md-6" >
                        <h3>Tổng doanh thu trong tháng: 
                            @if(isset($tongtien))
                                {{number_format($tongtien)}}đ
                            @endif
                        </h3>
                        <span>Tổng số lượng sản phẩm bán được trong tháng: 
                            @if(isset($soluong))
                                {{$soluong}}
                            @endif
                        </span>
                    </div>

                </div>
                <div class="table-responsive p-3">
                    
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>Địa Chỉ</th>
                                <th>Email</th>
                                <th>Thành tiền</th>
                                <th>Chức năng</th>
                                
                            </tr>
                        </thead>
                    
                        <tbody>
                            @if(isset($thongke))
                                @foreach($thongke as $item)
                                    <tr>
                                    <td>{{$index ++}}</td>
                                        <td>{{$item  -> HoTen}}</td>
                                        <td>{{$item  -> DiaChi}}</td>
                                        <td>{{$item  -> Email}}</td>
                                        <td>{{number_format($item -> thanhtien )}}đ</td>
                                        <td>
                                            <a href="{{route('admin.hoadonban.detail', $item -> idHDB) }}" class="btn btn-warning" >
                                                <i class="fa fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    <!--Row-->
    
    
   
</div>
@endsection


