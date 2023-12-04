
<?php $__env->startSection('content'); ?>

<style>
    .sub-banner{
        display: none;
    }
    .bartop{
        display: none;
    }

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

@media  screen and (max-width: 425px) {
	.my-login-page .card-wrapper {
		width: 90%;
		margin: 0 auto;
	}
}

@media  screen and (max-width: 320px) {
	.my-login-page .card.fat {
		padding: 0;
	}

	.my-login-page .card.fat .card-body {
		padding: 15px;
	}
}

.m-0 {
        /* display: none; */
}
</style>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="<?php echo e(('public/frontend/assets/images/person.png')); ?>" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h3 class="card-title">Đăng ký</h3>
							<form method="post" class="my-login-validation" novalidate="" action="<?php echo e(URL::to('/add-customer')); ?>">
                                <?php echo e(csrf_field()); ?>

								<div class="form-group">
									<label for="name">Họ và tên</label>
									<input id="name" type="text" class="form-control" name="customer_name" required autofocus>
									<div class="invalid-feedback">
										Tên của bạn là?
									</div>
								</div>

								<div class="form-group">
									<label for="email">Địa chỉ E-Mail</label>
									<input id="email" type="email" class="form-control" name="customer_email" required>
									<div class="invalid-feedback">
										Email hợp lệ!
									</div>
								</div>

								<div class="form-group">
									<label for="password">Mật khẩu</label>
									<input id="password" type="password" class="form-control" name="customer_password" required data-eye>
									<div class="invalid-feedback">
										Mật khẩu là bắt buộc!
									</div>
								</div>
                                <div class="form-group">
									<label for="">Số điện thoại</label>
									<input type="text" id="phone" type="password" class="form-control" name="customer_phone" required data-eye>
									<div class="invalid-feedback">
										Số điện thoại là bắt buộc!
									</div>
								</div>
								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">Tôi đồng ý với <a href="#">Các điều khoản và điều kiện</a></label>
										<div class="invalid-feedback">
                                        Bạn phải đồng ý với Điều khoản và Điều kiện của chúng tôi
										</div>
									</div>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block" style="margin-left: 0;">
										Đăng ký
									</button>
								</div>

								<div class="mt-4 text-center signup">
									Bạn đã có tài khoản? <a href="<?php echo e(URL::to('/login-checkout')); ?>">Đăng nhập</a>
								</div>

								<div class="mt-4 text-center signup_mobile">
									Đã có tài khoản? <a href="<?php echo e(URL::to('/login-checkout')); ?>">Đăng nhập</a>
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

</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shopdienthoailaravel\resources\views/pages/checkout/signup_checkout.blade.php ENDPATH**/ ?>