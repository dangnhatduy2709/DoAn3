@extends('/LayoutDotties/layout')

@section('content')
    <div class="Content">
        <div class="Content_Left">
            <h1 class="Content_left_font"> Tạo Tài Khoản </h1>
            <h1 class="Content_left_font_hr"></h1>
        </div>
        <div class="Content_right">
            <form action="{{ route('CheckSingnup') }}" method="post">
            @csrf
            @if(session()->has('Fail'))
				<div class="alert alert-success">
					{{session()->get('Fail') }}
				</div>
			@endif
                <div class="Content_right_login_dk_1">
                    <input type="text" name="name" placeholder="Họ Tên" >
                </div>
                <fieldset>
                    @error('email')
                        <div  style="color: red">{{ $message }}</div>
                    @enderror
                    <div>
                        <div class="Content_right_login">
                        <input type="email" name="email" placeholder="Email" id="email">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    @error('password')
                        <div  style="color: red">{{ $message }}</div>
                    @enderror
                    <div>
                        <div class="Content_right_password">
                            <input type="password" name="password" placeholder="Mật Khẩu" id="password">
                        </div>
                    </div>
                </fieldset>
                <div class="Content_right_password">
                    <input type="password" name="remember_token" placeholder=" Nhập Lại Mật Khẩu" id="password">
                </div>
                <div class="Content_right_font">
                    This site is protected by reCAPTCHA and the Google
                    <span><a href="https://policies.google.com/privacy">Privacy Policy</a></span>
                    and
                    <span><a href="https://policies.google.com/terms">Terms of Service</a></span>
                    apply
                </div>
                <div class="Content_right_test" >
                    <button type="submit"> Đăng Ký </button>
                </div>
                <div class="Content_right_test_0">
                    <p><i class="fa-solid fa-arrow-left-long"></i><a href="{{route('Login')}}">Đăng Nhập</a></p>
                </div>
            </form>

        </div>
    </div>
	

@endsection