@extends('/LayoutDotties/layout')

@section('content')
<main ontouchstart class="with-hover" style="display:flex; margin: 20px auto">

	<div class="Content">
		<div class="Content_Left">
			<h1 class="Content_left_font"> Đăng Nhập</h1>
			<h1 class="Content_left_font_hr"></h1>
		</div>
		<form id="lginKH" action="{{route('CheckLogin')}}" method="post" name="login">
			@csrf
			@if(session()->has('Fail'))
				<div class="alert alert-success">
					{{session()->get('Fail') }}
				</div>
			@endif
			<div class="Content_right_login">
				<input id="email" type="email" name="email" class="Email" placeholder="*******@polo.com"/>
			</div>
			<div class="Content_right_password">
				<input id="password" type="password" name="password" class="Password" placeholder="••••••••"/>
			</div>
				
			<div class="Content_right_font">
				Forgot Password?
			</div>
			<div id="baoloi"></div>
			<div class="Content_right_test" id="dangnhap">
				<button type="submit"> Đăng Nhập </button>
			</div>
			<div class="Content_right_font_1">
				Or login with
			</div>
			<div class="link">
				<div class="Content_right_Facebook">
					<a href="https://www.facebook.com/profile.php?id=100055885106161"><i class="fa-brands fa-facebook"><span> Facebook </span></i></a>
				</div>
				<div class="Content_right_Instargam">
					<a href="https://www.instagram.com/12th24.2002/"><i class="fa-brands fa-instagram"><span> Instagram </span></i></a>
				</div>
			</div>
			<div class="Content_right_font_2">
				Don't have account?  <span><a href="{{route('Singnup')}}"> Signup Now .</a></span>
			</div>
		</form>
	</div>
</main>

	
    
	

@endsection




