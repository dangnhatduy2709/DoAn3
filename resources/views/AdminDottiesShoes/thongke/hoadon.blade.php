@extends('/AdminDottiesShoes/LayoutDotties/layout')

@php
    $index = 1;

@endphp

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống kê số lượng nhập</h1>
    
    </div>

    <div class="row">
        <div class="col-lg-12">
            
            <div class="card mb-4">
                <div class="col-xs-12" style="display: flex; padding-top: 30px;" >
                    
                   

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
                            

                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    <!--Row-->
    
    
   
</div>
@endsection


