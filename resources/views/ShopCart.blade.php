@extends('/LayoutDotties/layout')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('TrangChu')}}">Home</a>
                            <a href="{{route('Shop')}}">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content"> 
    <div class="grid">
        
        <div class="grid__row">
            <div class="infocart">
                    @if ($message = Session::get('success'))
                          <div id="message-sucess" style="background-color: chartreuse;padding: 12px;}">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div id="message-error" style="background-color: #ED2B2A;padding: 12px; color: #fff;">
                            {{ $message }}
                        </div>
                    @endif
                <table class="table" style="width: 100%">
                    <thead>
                        <tr class="table-title">
                            <th class="image">Hình Ảnh</th>
                            <th style="width: 40%">Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                   
                    <tbody id="mycart">
                        @foreach($cartItems as $item)
                            <tr>
                                <td >
                                    <div style="text-align: center;">
                                        <img src="/upload/{{$item->attributes->image}}" alt="" style="width: 120px;margin-right:40px;">
                                    </div>
                                </td>
                                <td>       
                                    <span class="spn-title">{{$item -> name}}</span>
                                </td>
                                <td><span class="spn-price" >{{number_format($item -> price)}} đ</span></td>
                                <td >
                                    <form action="{{ route ('cart.update') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$item -> id}}" name="id">
                                        <input type="number" value ="{{$item -> quantity}}" name="quantity" class="ip-quantity" style="text-align:right;">
                                        <button type="submit" class="btn-update" style="text-align:right;">update</button>
                                    </form>
                                </td>
                                <td >
                                    <span class =" spn-price" >{{number_format($item -> price * $item -> quantity)}} đ</span>
                                    
                                </td>
                                <td>
                                    <form action="{{ route ('cart.removeCart') }}" method= "post">
                                        @csrf
                                        <input type="hidden" value="{{$item -> id}}" name="id">
                                        <button  class="btn-delte">Xóa</button>
                                        
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    
                    </tbody>
                </table>
                <div class="tongtien">
                    <span>Tổng tiền <span id="tongtien">{{number_format(Cart::getTotal())  }}</span> đ</span>
                </div>
            </div> 
        </div>
        
        <div class="listbutton">
            <form action="{{ route ('cart.clear')}}" method="post" style="width: 15%; margin-right: 20px;">
                @csrf
                <button class="btn-cart-remove hoverbeffo" >Xóa giỏ hàng</button>
            </form>          
        </div>
</div>
    <div class="col-lg-4" style="margin-left:35%">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            
                        </ul>
                        <a href="{{route('CheckOut')}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    <script>
        setTimeout(function() {
            document.getElementById('message-sucess')?.remove();
            document.getElementById('message-error')?.remove();
        }, 5000);
    </script>
</section>
    <!-- Shopping Cart Section End -->
@endsection