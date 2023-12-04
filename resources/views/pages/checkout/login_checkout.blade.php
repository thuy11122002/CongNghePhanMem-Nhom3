@extends('layout')
@section('content')

<style>
    .sub-banner{
        display: none;
    }
    .bartop{
        display: none;
    }

	.my-login-page{
        font-size: 1.8rem;
		
	}
</style>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img class="img_login" src="{{('public/frontend/assets/images/person.png')}}" alt="logo">
						<img class="img_login_mobile" src="{{('public/frontend/assets/images/person.png')}}" alt="logo" width="70%">

					</div>
					<div class="card fat">
						<div class="card-body">
							<h2 class="card-title">Đăng nhập</h2>
							<form method="POST" class="my-login-validation" novalidate="" action="{{URL::to('/login-customer')}}">
								{{csrf_field()}}
								<div class="form-group">
									<label for="email">Địa chỉ E-Mail</label>
									<input id="email" type="email" class="form-control" name="email_account" value="" required autofocus>
									<div class="invalid-feedback">
										Email hợp lệ!
									</div>
								</div>

								<div class="form-group">
									<label for="password">Mật khẩu
										<a href="" class="float-right">
											Quên mật khẩu?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password_account" required data-eye>
								    <div class="invalid-feedback">
								    	Mật khẩu là bắt buộc!
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Ghi nhớ đăng nhập!</label>
									</div>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block" style="margin-left: 0;">
										Đăng nhập
									</button>
								</div>
								<div class="mt-4 text-center signup">
									Chưa có tài khoản? <a href="{{ URL::to('/signup-checkout') }}">Đăng ký tài khoản!</a>
								</div>

								<div class="mt-4 text-center signup_mobile">
									Chưa có tài khoản? <a href="{{ URL::to('/signup-checkout') }}">Đăng ký!</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						
					</div>
				</div>

				
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>

	<style>
		html,body {
	height: 100%;
}

body.my-login-page {
	background-color: #f7f9fb;
	font-size: 14px;
}

.my-login-page .brand {
	width: 90px;
	height: 90px;
	overflow: hidden;
	border-radius: 50%;
	margin: 40px auto;
	box-shadow: 0 4px 8px rgba(0,0,0,.05);
	position: relative;
	z-index: 1;
}

.my-login-page .brand img {
	width: 100%;
}

.my-login-page .card-wrapper {
	width: 400px;
}

.my-login-page .card {
	border-color: transparent;
	box-shadow: 0 4px 8px rgba(0,0,0,.05);
}

.my-login-page .card.fat {
	padding: 10px;
}

.my-login-page .card .card-title {
	margin-bottom: 30px;
}

.my-login-page .form-control {
	border-width: 2.3px;
}

.my-login-page .form-group label {
	width: 100%;
}

.my-login-page .btn.btn-block {
	padding: 12px 10px;
}

.my-login-page .footer {
	margin: 40px 0;
	color: #888;
	text-align: center;
}

@media screen and (max-width: 425px) {
	.my-login-page .card-wrapper {
		width: 90%;
		margin: 0 auto;
	}
}

@media screen and (max-width: 320px) {
	.my-login-page .card.fat {
		padding: 0;
	}

	.my-login-page .card.fat .card-body {
		padding: 15px;
	}
}

	</style>
</body>
@endsection