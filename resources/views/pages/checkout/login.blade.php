@extends('layout')
@section('content')
@section('title')
đăng nhập - Đăng ký
@endsection

<section id="form" style="margin-top: 0px;"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>đăng nhập tài khoản</h2>
						@if(Session::has('thongbao'))
							<div class="alert-danger">{{ Session::get('thongbao') }}</div>
						@endif
						<form action="{{ route('checkout.postlogin') }}" method="post">
							@method('post')
							@csrf
							<input type="email" name="email" placeholder="email cua ban" />
							<input type="password" name="pass" placeholder="mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								ghi nhớ đăng nhập
							</span>
							<button type="submit" class="btn btn-default">đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">HOẶC</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới</h2>
						<form action="{{ route('checkout.addCtm') }}" method="post">
							@method('POST')
							@csrf
							<input type="text" name="name" placeholder="Name"/>
							<input type="email" name="email" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
							<input type="text" name="phone" placeholder="phone number"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection