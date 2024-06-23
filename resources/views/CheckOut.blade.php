@extends('/LayoutDotties/layout')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="{{route('TrangChu')}}">Home</a>
                        <a href="{{route('Shop')}}">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{route('ThanhToan')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                                here</a> to enter your code</h6>
                        <h6 class="checkout__title">Billing Details</h6>
                        <from action="" method="post">
                            <div class="checkout__input">
                                <p>Họ Tên<span>*</span></p>
                                <input type="text" name="HoTen">
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="DiaChi">
                            </div>
                            <div class="checkout__input">
                                <p>Phone<span>*</span></p>
                                <input type="text" name="SoDT">
                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="text" name="Email">
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input name="notes" value="Chờ Xác Nhận">
                            </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <table class="table-check">
                                <thead>
                                    <tr>
                                        <th>Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Giá Tiền</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $cart)
                                        <tr class="itemmm">
                                            <td>{{$cart->name}}</td>
                                            <td>{{$cart->quantity}}</td>
                                            <td>{{number_format($cart->price)}} VND</td>
                                            <td>{{number_format($cart->price * $cart->quantity)}} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <ul class="checkout__total__all">
                                <!-- Tổng số hoặc các phần tử khác có thể được thêm vào đây -->
                            </ul>

                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="radio" id="payment" name="payment_type" value="Check Payment" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="radio" id="paypal" name="payment_type" value="Paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="breadcrumb__text">
                            <h5> Hiện Chưa Có Sản Phẩm Nào Cần Thanh Toán </h5>
                        </div>
                        <br> <br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="{{route('Shop')}}">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>

    </div>
</section>
<!-- Checkout Section End -->
@endsection