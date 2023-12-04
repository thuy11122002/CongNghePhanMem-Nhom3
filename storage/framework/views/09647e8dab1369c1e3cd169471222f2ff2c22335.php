<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./vendors/js/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/vendors/css/grid.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/cart.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/product_details.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/carousel_pddt.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/checkout.css')); ?>">

    <script src="<?php echo e(asset('public/frontend/assets/js/carousel_pddt.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/assets/js/cart.js')); ?>"></script>
    <script src="<?php echo e(asset('https://kit.fontawesome.com/bf8f778c02.js')); ?>" crossorigin="anonymous"></script>

    <style>
        div#payment {
            margin-left: -5px;
        }

        div#login_logout {
            margin-left: -62px;
        }

        div#customer {
            margin-left: 5px;
            width: 245px;
        }

        .carousel_bartop_item {
            border-radius: 30px;
        }

        .bar_item {
            border-radius: 30px;
        }

        .group_item-body {
            height: 184px;
        }

        #filter form div.form-group {
            float: left;
            width: calc((100% - 20px) / 3);
            /* chiều rộng của mỗi phần tử */
            max-width: 280px;
        }

        .login_mobile {
            display: none;
        }

        .customer_mobile {
            display: none;
        }

        .view_mobile {
            display: none;
        }

        .logout_mobile {
            display: none;
        }

        .header_cart_mobile {
            display: none;
        }

        .search_mobile {
            display: none;
        }

        .cate_mobile {
            display: none;
        }

        .search_mobile {
            display: none;
        }

        .cart_mobile {
            display: none;
        }

        .signup_mobile {
            display: none;
        }

        .img_login_mobile {
            display: none;
        }

        .signup_mobile {
            display: none;
        }

        .details_on_mobile{
            display: none;
        }

        .payment_on_mobile{
            display: none;
        }
        
        .handcash_mobile{
            display: none;
        }

        .order_on_mobile{
            display: none;
        }

        .vieworder_customer_mobile{
            display: none;
        }

        .search_avanced_mobile{
            display: none;
        }

        .tech_news_mobile{
            display: none;
        }

        .news_mobile{
            display: none;
        }
        /* mobile < 740 */
        @media  only screen and (max-width: 740px) {
            /* .header_navbar-top{
                display: none;
            } */

            .news{
                display: none;
            }
            .news_mobile{
                display: block;
            }
            .tech_news{
                display: none;
            }

            .tech_news_mobile{
                display: block;
            }

            .vieworder_customer{
                display: none;
            }
            
            .vieworder_customer_mobile{
                display: block;
            }

            .order{
                display: none;
            }

            .order_on_mobile{
                display: block;
                margin-top: -40px;
                margin-left: -35px;
            }

            .handcash{
                display: none;
            }

            .handcash_mobile{
                display: block;
            }
            
            .payment{
                display: none;
            }

            .payment_on_mobile{
                display: block;
            }

            .details{
                display: none;
            }

            .details_on_mobile{
                display: block;
                margin-top: 90px;
            }
            .search {
                display: none;
            }

            .search_avanced {
                display: none;
            }

            .search_mobile {
                display: block;
            }

            .search_avanced_mobile {
                display: block;
            }

            .form-control {
                font-size: 1rem;
                padding: 0.2rem 0.75rem;
                width: 110%;
                height: calc(1.5em + 0.75rem + 2px);
                font-weight: 400;
                line-height: 1.5;
                color: rgb(73, 80, 87);
                background-color: rgb(255, 255, 255);
                /* background-clip: padding-box; */
                /* border-width: 1px; */
                border-style: solid;
                border-color: rgb(206, 212, 218);
                border-image: initial;
                border-radius: 0.25rem;
                transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                margin-left: -10px;

            }

            .cate-group {
                margin-right: 15px;
            }

            .btn {
                font-size: 1.2rem;
                min-width: 69px;
                margin-left: 175px;
            }

            .content_group-title h1 {
                font-size: 1.5rem;
            }

            .bartop_mobile {
                display: none;
            }

            .content {
                margin-top: 60px;
            }

            .content_group-title{
                padding-top: 10px;
            }

            .search {
                display: none;
            }

            .search_mobile {
                display: block;
                width: auto;
            }

            .cart {
                display: none;
            }

            .header_cart_mobile {
                display: block;
                margin-left: -5px;
            }

            .header_cart {
                background-color: #da1a1a;
            }

            .login_mobile {
                display: block;
                margin-left: 10px;
            }

            #login_logout {
                display: none;
            }

            .checkout {
                display: none;
            }

            .header_cart-history {
                border-left: none;
                border-right: none;
            }

            .header_cart-history i {
                font-size: 16px;
                margin-left: -8px;
            }

            .view_mobile {
                display: block;
                margin-left: -12px;

            }

            .logout_mobile {
                display: block;
                margin-right: -12px;

            }

            #customer {
                display: none;
            }

            .customer_mobile {
                display: block;

            }

            .header_search-logo img {
                width: 20px;
                height: 20px;
            }

            .header_navbar_accessory {
                margin-left: 120px;
                max-width: 180px;
                margin-top: 50px;
            }

            .header_accessory_link {
                font-size: 13px;
            }

            .cate_mobile {
                display: block;
            }

            .header_navbar_link {
                font-size: 0.8rem;
            }

            .header_navbar_item {
                height: 50px;
            }

            /* cart */

            .cart {
                display: none;
            }

            .cart_mobile {
                display: block;
            }

            .card-title {
                font-size: 1.5rem;
            }

            .my-login-page .form-group label {
                width: 100%;
                font-size: 1.3rem;
            }

            .signup {
                display: none;
            }

            .signup_mobile {
                display: block;
            }

            .img_login {
                display: none;
            }

            .img_login_mobile {
                display: none;
            }

            .brand {
                display: none;
            }

            .fat {
                margin-top: 30px;
            }

            .signup {
                display: none;
            }

            .signup_mobile {
                display: block;
            }

            .mb-3 {
                font-size: 1.6rem;
            }

        }

        /* tablet >= 740 <= 1024 */
        @media  only screen and (min-width: 740px) and (max-width: 1023px) {}

        /* pc >= 1024 */
        @media  only screen and (min-width: 1024px) {}
    </style>
</head>

<body>
    <div class="main">
        <!-- start header--- -->
        <div class="header">
            <!-- start-navbar-top--- -->
            <div class="header_navbar-top">
                <div id="myCarousel">
                    <div class="carousel-inner">
                        <div class="">
                            <div class="grid wide">
                                <img src="<?php echo e(asset('public/frontend/assets/images/banner_top.png')); ?>" width="100%" alt="Photos">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end--navbar-top-- -->
            <!-- start-header-with-search--------->
            <div class="header_with_search">
                <div class="grid wide">
                    <div class="container">
                        <div class="row">
                            <div class="header_with_search-main">
                                <div class="header_search_left">
                                    <a href="<?php echo e(URL::to('/trang-chu')); ?>" class="header_search-logo">
                                        <img class="hidden_on_mobile" src="<?php echo e(asset('public/frontend/assets/images/logo.png')); ?>" alt="logo" width="100%">
                                        <img class="show_on_mobile logo_on_mobile" src="<?php echo e(asset('public/frontend/assets/images/home_mobile.png')); ?>" alt="logo">
                                    </a>

                                    <div class="col-md-7 search">
                                        <form action="<?php echo e(URL::to('/tim-kiem')); ?>" class="header_search" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <input class="show_on_mobile" onclick="search_on_mobile()" type="text" placeholder="Tìm kiếm...">
                                            <input class="hidden_on_mobile" name="keywords_submit" type="text" placeholder="Tìm kiếm...">
                                            <button type="submit" name="search_item"><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>

                                    <!-- search on mobile -->
                                    <div class="col-md-6 search_mobile" style="width: 200px">
                                        <form action="<?php echo e(URL::to('/tim-kiem')); ?>" class="header_search" method="post"  style="width: 170px;">
                                            <?php echo e(csrf_field()); ?>

                                            <input class="show_on_mobile" onclick="search_on_mobile()" type="text" placeholder="Tìm kiếm...">
                                            <input class="hidden_on_mobile" name="keywords_submit" type="text" placeholder="Tìm kiếm...">
                                            <button type="submit" name="search_item"><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>


                                    <div class="col-md-2 cart" style="margin-left: -15px;">
                                        <a href="<?php echo e(URL::to('/show-cart')); ?>" class="header_cart" id="header_cart">
                                            <span class="number"><i class="fa-solid fa-cart-shopping"></i></span>
                                            <span class="hidden_on_mobile">Giỏ hàng</span>
                                            <div class="header_cart-overlay"></div>
                                        </a>
                                    </div>

                                    <!-- cart mobile -->
                                    <div class="header_cart_mobile" style="margin-left: -15px;">
                                        <a href="<?php echo e(URL::to('/show-cart')); ?>" class="header_cart" id="header_cart">
                                            <span class="number"><i class="fa-solid fa-cart-shopping"></i></span>
                                            <span class="hidden_on_mobile">Giỏ hàng</span>
                                            <div class="header_cart-overlay"></div>
                                        </a>
                                    </div>
                                    <!-- view mobile -->
                                    <div class="view_mobile">
                                        <?php
                                        $customer_name = Session::get('customer_name');
                                        if ($customer_name != null) {
                                        ?>
                                            <a href="<?php echo e(URL::to('/vieworder-customer/'.$customer_name)); ?>" class="header_cart" id="header_cart">
                                                <span class="number"><i class="fa-sharp fa-solid fa-file-invoice"></i></span>
                                                <div class="header_cart-overlay"></div>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>


                                    <div class="col-md-2 checkout" style="margin-left: -50px;">
                                        <?php
                                        $customer_id = Session::get('customer_id');
                                        if ($customer_id != null) {
                                        ?>
                                            <a href="<?php echo e(URL::to('/checkout')); ?>" class="header_cart-history" id="">
                                                Thanh toán
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="<?php echo e(URL::to('/login-checkout')); ?>" class="header_cart-history" id="">
                                                Thanh toán
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="col-md-2" id="login_logout" style="margin-left: -100px;">
                                        <?php
                                        $customer_id = Session::get('customer_id');
                                        if ($customer_id == null) {
                                        ?>
                                            <a href="<?php echo e(URL::to('/login-checkout')); ?>" class="header_cart-history" id="">
                                                Đăng nhập
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <!-- dang nhap on mobile -->
                                    <div class="login_mobile">
                                        <?php
                                        $customer_id = Session::get('customer_id');
                                        if ($customer_id == null) {
                                        ?>
                                            <a href="<?php echo e(URL::to('/login-checkout')); ?>" class="header_cart-history" id="">
                                                Đăng nhập
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <!--  -->
                                    <div class="col-md-2" id="customer" style="margin-left: -175px; width: 770px;">

                                        <li class="header_navbar_acctive" style="list-style-type: none;">
                                            <a href="#" class="header_navbar_link">
                                                <?php
                                                $customer_name = Session::get('customer_name');
                                                if ($customer_name != null) {
                                                ?>
                                                    <a href="" class="header_cart-history" id="customer_name">
                                                        <i class="fa-solid fa-circle-user fa-xl" style="margin-left: 5px;"></i>
                                                        <?php echo e($customer_name); ?>

                                                    </a>
                                                <?php
                                                }
                                                ?>
                                            </a>

                                            <div class="header_navbar_accessory" style="margin-top: -15px; width: 175px;">
                                                <div class="header_accessory-item-group">
                                                    <ul class="header_accessory_list">
                                                        <li class="header_accessory_item">
                                                            <a href="<?php echo e(URL::to('/vieworder-customer/'.$customer_name)); ?>" class="header_accessory_link"><i class="fa-sharp fa-solid fa-file-invoice"></i> Đơn mua</a>
                                                        </li>
                                                        <li class="header_accessory_item">
                                                            <a href="<?php echo e(URL::to('/logout-checkout')); ?>" class="header_accessory_link"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </li>
                                    </div>

                                    <!-- customer on mobile -->
                                    <div class="customer_mobile">

                                        <li class="header_navbar_acctive" style="list-style-type: none;">
                                            <a href="#" class="header_navbar_link">
                                                <?php
                                                $customer_name = Session::get('customer_name');
                                                if ($customer_name != null) {
                                                ?>
                                                    <a href="" class="header_cart-history" id="customer_name">
                                                        <i class="fa-solid fa-circle-user fa-xl" style="color: #32e2b6"></i>

                                                    </a>
                                                <?php
                                                }
                                                ?>
                                            </a>

                                            <div class="header_navbar_accessory">
                                                <div class="header_accessory-item-group">
                                                    <ul class="header_accessory_list">
                                                        <li class="header_accessory_item">
                                                            <a href="" class="header_accessory_link"><?php echo e($customer_name); ?></a>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </li>


                                    </div>

                                    <!--  -->

                                    <!-- logout mobile -->
                                    <div class="logout_mobile" style="margin-left: -4px;">
                                        <?php
                                        $customer_name = Session::get('customer_name');
                                        if ($customer_name != null) {
                                        ?>
                                            <a href="<?php echo e(URL::to('/logout-checkout')); ?>" class="header_cart" id="header_cart">
                                                <span class="number"><i class="fa-solid fa-right-from-bracket"></i></span>
                                                <div class="header_cart-overlay"></div>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!--  -->

                                    <!-- <label onclick="show_tab_on_mobile()" for="check_menu_list_on_mobile" class="menu_list_on_mobile" id="menu_list_on_mobile">
                                        <i class="fas fa-bars"></i>
                                        <Span>Menu</Span>
                                    </label>
                                    <input type="checkbox" hidden id="check_menu_list_on_mobile" class="check_menu_list_on_mobile"> -->

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- end-header-with-search--------->
            <!-- start-navbar-bottom----------------->
            <div class="hidden_on_mobile header_navbar_bottom grid wide">
                <ul class="header_navbar_list">
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                    $fontawe;
                    if($cate->category_id == 12){
                    $fontawe = 'fa-solid fa-mobile-screen fa-xl';
                    }elseif($cate->category_id == 13){
                    $fontawe = 'fa-solid fa-headphones fa-xl';

                    }elseif($cate->category_id == 14){
                    $fontawe = 'fa-solid fa-battery-full fa-xl';

                    }elseif($cate->category_id == 15){
                    $fontawe = 'fa-solid fa-mobile-screen fa-xl';
                    }
                    ?>

                    <li class="header_navbar_item">
                        <span>
                            <i class="<?php echo e($fontawe); ?>"></i>
                            <!-- <i class="fa-solid fa-mobile-screen fa-2xl"></i> -->
                        </span>
                        <a href="<?php echo e(URL::to('/danh-muc-san-pham/'.$cate->category_id)); ?>" class="header_navbar_link"> <?php echo e(($cate->category_name)); ?></a>
                    </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- <li class="header_navbar_item">
                            <span>
                                <i class="fa-solid fa-newspaper fa-xl"></i>
                            </span>
                            <a href="#" class="header_navbar_link">Tin tức</a>
                            
                    </li>    -->

                    <li class="header_navbar_item header_navbar_acctive">
                        <a href="#" class="header_navbar_link"><i class="fa-regular fa-newspaper fa-lg" style="margin-right: 3px"></i></i>Tin tức<i class="fas fa-caret-down"></i></a>
                        <div class="header_navbar_accessory">
                            <div class="header_accessory-item-group">

                                <ul class="header_accessory_list">
                                    <li class="header_accessory_item">
                                        <a href="<?php echo e(URL::to('/tintuc-sanphammoi')); ?>" class="header_accessory_link">Sản phẩm mới</a>
                                    </li>
                                    <li class="header_accessory_item">
                                        <a href="<?php echo e(URL::to('/tintuc-congnghe')); ?>" class="header_accessory_link">Công nghệ</a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </li>

                    
                </ul>
            </div>

            <!-- cate mobile-->
            <div class="cate_mobile header_navbar_bottom grid wide" style="margin-left: 4px;">
                <ul class="header_navbar_list">

                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                    $fontawe;
                    if($cate->category_id == 12){
                    $fontawe = 'fa-solid fa-mobile-screen fa-xl';
                    }elseif($cate->category_id == 13){
                    $fontawe = 'fa-solid fa-headphones fa-xl';

                    }elseif($cate->category_id == 14){
                    $fontawe = 'fa-solid fa-battery-full fa-xl';

                    }elseif($cate->category_id == 15){
                    $fontawe = 'fa-solid fa-mobile-screen fa-xl';
                    }
                    ?>

                    <li class="header_navbar_item">
                        <span>
                            <i class="<?php echo e($fontawe); ?>"></i>
                            <!-- <i class="fa-solid fa-mobile-screen fa-2xl"></i> -->
                        </span>
                        <br>
                        <a href="<?php echo e(URL::to('/danh-muc-san-pham/'.$cate->category_id)); ?>" class="header_navbar_link" id="title_cate"> <?php echo e(($cate->category_name)); ?></a>
                    </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- <li class="header_navbar_item">
                            <span>
                                <i class="fa-solid fa-newspaper fa-xl"></i>
                            </span>
                            <a href="#" class="header_navbar_link">Tin tức</a>
                            
                    </li>    -->

                    <li class="header_navbar_item header_navbar_acctive">
                        <a href="#" class="header_navbar_link"><i class="fa-regular fa-newspaper fa-2xl" style="margin-right: 3px"></i>
                            <br>
                            <span>Tin tức</span>
                            <i class="fas fa-caret-down"></i></a>
                        <div class="header_navbar_accessory list_news_mobile" style="
    margin-left: 0px;
    max-width: 110px;
    margin-top: 40px;
">
                            <div class="header_accessory-item-group">
                                <ul class="header_accessory_list">
                                    <li class="header_accessory_item">
                                        <a href="<?php echo e(URL::to('/tintuc-sanphammoi')); ?>" class="header_accessory_link" style="font-size: 1rem;">Sản phẩm mới</a>
                                    </li>
                                    <li class="header_accessory_item">
                                        <a href="<?php echo e(URL::to('/tintuc-congnghe')); ?>" class="header_accessory_link" style="font-size: 1rem;">Công nghệ</a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>



            <!-- end navbar bottom--------------- -->
        </div>


        <!-- end--header-- -->
        <div class="content">
            <div class="grid wide">
                <!-- start-bar-top-- -->
                <div class="bartop bartop_checkout">
                    <div class="row bartop_mobile">
                        <div class="col l-8 c-12" style="margin-top: 20px;background-color: yellow;border-radius: 20px;height: 380px;">
                            <div id="carousel_bartop" class="carousel slide carousel_bartop" data-ride="carousel">
                                <ul class="carousel-indicators ul_carousel_bartop">
                                    <li data-target="#carousel_bartop" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel_bartop" data-slide-to="1"></li>
                                </ul>
                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active carousel_bartop_item">
                                        <a href="#">
                                            <img src="<?php echo e(asset('public/frontend/assets/images/830-300-830x300-6.png')); ?>" style="margin: 15px 32px;" width="725px" height="345px" alt="Photos">
                                        </a>
                                    </div>
                                    <div class="carousel-item carousel_bartop_item">
                                        <a href="#">
                                            <img src="<?php echo e(asset('public/frontend/assets/images/830-300-830x300-8.png')); ?>" style="margin: 15px 32px;" width="725px" height="345px" alt="Photos">
                                        </a>
                                    </div>
                                </div>
                                <!-- Left and right controls -->
                                <a class="carousel-control-prev carousel-content-group" href="#carousel_bartop" data-slide="prev">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a class="carousel-control-next carousel-content-group" href="#carousel_bartop" data-slide="next">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col l-4 c-0" style="margin-top: 20px;">
                            <div class="row">
                                <ul class="bar_list">
                                    <li class="bar_item">
                                        <a href="#" class="bar_link">
                                            <img src="<?php echo e(asset('public/frontend/assets/images/laptopdesk(3)-340x340.jpg')); ?>" width="220%" height="184px" alt="Photos" style="border-radius: 15px;">
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="row">
                                <ul class="bar_list">
                                    <li class="bar_item">
                                        <a href="#" class="bar_link">
                                            <img src="<?php echo e(asset('public/frontend/assets/images/laptopdesk-340x340.jpg')); ?>" width="220%" height="184px" alt="Photos" style="border-radius: 15px;">
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>

                </div>



                <!-- start_event_group -->

                <?php echo $__env->yieldContent('content'); ?>



                <!-- start_group_smart_phone -->

                <!-- start group accessory- -->

                <!-- start_trademark -->

                <!-- start technology and app----------- -->

            </div>
            <!-- start_chatbox -->


        </div>
        <footer>
            <div class="grid wide">
                <div class="footer_body">
                    <div class="row">
                        <div class="col l-3 c-6">
                            <ul class="footer_body_list">
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Tích điểm quà tặng VIP</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Lịch sử mua hàng</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col l-3 c-6">
                            <ul class="footer_body_list">
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Tìm hiểu về mua trả góp</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Chính sách bảo hành</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col l-3 c-6">
                            <ul class="footer_body_list">
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Tổng đài hỗ trợ (Miễn phí
                                        gọi)</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Gọi mua: 0389938946</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col l-3 c-6">
                            <ul class="footer_body_list">

                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Gửi ý kiến</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer_bottom">
                <p>
                    © 2018. Công ty cổ phần Mobile Shop. GPDKKD: 0303217354 do sở KH & ĐT TP.HCM cấp ngày
                    02/01/2007. GPMXH: 238/GP-BTTTT do Bộ Thông Tin và Truyền Thông cấp ngày 04/06/2020.</p>

                <p>
                    Địa chỉ: 99 An Dương Vương, p16 q8 Hồ Chí Minh. Điện thoại: 028 38125960. Email:
                    hquan20020915@gmail.com
                    . Chịu trách nhiệm nội dung: Nguyễn Hoàng Quân. </p>
            </div>
        </footer>
    </div>
</body>

<style>


</style>

</html><?php /**PATH C:\xampp\htdocs\shopdienthoailaravel\resources\views/layout.blade.php ENDPATH**/ ?>