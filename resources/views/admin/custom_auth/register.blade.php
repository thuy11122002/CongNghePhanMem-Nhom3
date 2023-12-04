<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng ký thành viên</title>

    <!-- Custom fonts for this template-->
    <link href="{{('public/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{('public/backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng ký thành viên</h1>
                                    </div>
                                    <?php
                                            $message = Session::get('message');
                                            if($message){
                                                echo $message;
                                                Session::put('message', null);
                                            }
                                    ?>
                                    <form class="user" action="{{URL::to('/register')}}" method="post">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name = "admin_name"
                                                id="" aria-describedby=""
                                                placeholder="Enter Name..."
                                                value="{{old('admin_name')}}">
                                               
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name = "admin_email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name = "admin_phone"
                                                id="" aria-describedby=""
                                                placeholder="Enter Phone..."
                                                value="{{old('admin_phone')}}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name = "admin_password"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit" name="login">
                                            Sign In
                                        </button>
                                        <!-- <a class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                        <a class="btn btn-facebook btn-user btn-block" href="{{url('/register-auth')}}">
                                            <i class="fab fa-facebook-f fa-fw"></i> Sign In Auth
                                        </a>
                                        <a class="btn btn-facebook btn-user btn-block" href="{{url('/login-auth')}}">
                                            <i class="fab fa-facebook-f fa-fw"></i> Log In Auth
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{('public/backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{('public/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{('public/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{('public/backend/js/sb-admin-2.min.js')}}"></script>

</body>

</html>