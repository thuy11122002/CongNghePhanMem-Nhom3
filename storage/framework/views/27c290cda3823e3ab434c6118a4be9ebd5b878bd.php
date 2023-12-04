<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Di Dong</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <link rel="stylesheet" href="<?php echo e(('public/frontend/assets/css/base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(('public/frontend/vendors/css/grid.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(('public/frontend/assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(('public/frontend/assets/css/cart.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(('public/frontend/assets/css/product_details.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(('public/frontend/assets/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(('public/frontend/assets/css/carousel_pddt.css')); ?>">
    <script src="<?php echo e(('public/frontend/assets/js/carousel_pddt.js')); ?>"></script>
    <script src="<?php echo e(('public/frontend/assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(('public/frontend/assets/js/cart.js')); ?>"></script>
</head>

<body>
    <div class="main">
        <!-- start header--- -->
        <div class="header">
            <!-- start-navbar-top--- -->
            <div class="header_navbar-top">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active header_slide_1">
                            <div class="grid wide">
                                <img src="<?php echo e(('public/frontend/assets/images/header_navbar_top_1.png')); ?>" width="100%" alt="Photos">
                            </div>
                        </div>
                        <div class="carousel-item header_slide_2">
                            <div class="grid wide">
                                <img src="<?php echo e(('public/frontend/assets/images/2011-1200-44-1200x44.png')); ?>" width="100%" alt="Photos">
                            </div>
                        </div>
                    </div>
                    <div class="grid wide">
                        <a class="carousel-control-prev header_slide_control_1" href="#myCarousel" data-slide="prev">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a class="carousel-control-next header_slide_control_2" href="#myCarousel" data-slide="next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end--navbar-top-- -->
            <!-- start-header-with-search--------->
            <div class="header_with_search">
                <div class="grid wide ">
                    <div class="header_with_search-main">
                        <div class="header_search_left">
                            <a href="index.html" class="header_search-logo">
                                <img class="hidden_on_mobile" src="<?php echo e(('public/frontend/assets/images/logo.jpg')); ?>" alt="logo">
                                <img class="show_on_mobile logo_on_mobile" src="<?php echo e(('public/frontend/assets/images/logo_mobile.png')); ?>" alt="logo">
                            </a>
                            <label for="header_adress_checkbox" class=" header_search-adress" id="header_search-adress">
                                <span class="hidden_on_mobile header_search-adress-title">Xem giá, khuyến mãi tại</span>
                                <div class="header_search-adress_body">
                                    <span class="header_adress_body-title">
                                        <h3>  <i class="adress_icon_location fas fa-map-marker-alt"></i>
                                        P.Nguyễn Thái Hoàng hà nội</h3>
                                    </span>
                                    <i class="hidden_on_mobile fas fa-sort-down"></i>
                                </div>
                            </label>
                            <input type="checkbox" hidden id="header_adress_checkbox" class="header_adress_checkbox">
                            <div class="screen_overlay">

                            </div>
                            <form action="#" class="header_adress_form">
                                <div class="header_adress_form-header">
                                    <h3>Chọn địa chỉ nhận hàng</h3>
                                    <label for="header_adress_checkbox" class="header_adress_checkbox">
                                        <i class="fas fa-times"></i>
                                        <span>Đóng</span>
                                    </label>
                                </div>
                                <div class="header_adress_form-body">
                                    <input type="checkbox" hidden id="checkbox_header_form_input_detal"
                                        class="checkbox_header_form_input_detal">

                                    <div class="header_adress_nodetail">
                                        <label for="checkbox_header_province_body_input"
                                            class="header_adress_body_input">
                                            <span>Hồ Chí Minh</span>
                                            <i class="fas fa-sort-down"></i>
                                        </label>
                                        <input type="checkbox" hidden id="checkbox_header_province_body_input"
                                            class="checkbox_header_adress_body_input">
                                        <span class="header_form_district">Quận: <span>1</span></span>
                                        <span class="header_form_wards">Phường: <span>1</span></span>
                                        <label for="checkbox_header_form_input_detal"
                                            class="header_form_input_detal">Chọn địa chỉ khác</label>
                                        <div class="header_adress_body_showprovince">
                                            <div class="header_adress_body_showprovince_search">
                                                <i class="fas fa-search"></i>
                                                <input type="text" placeholder="Nhập để tìm kiếm">
                                            </div>
                                            <ul class="header_adress_body_showprovince_list">
                                                <li class="header_adress_body_showprovince_link"><a href="#"><strong>Hà
                                                            Nội</strong></a></li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                                <li class="header_adress_body_showprovince_link"><a href="#">Hà Nội</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="header_adress_detail">
                                        <h4 class="header_adress_detail_title"><strong>Chọn địa chỉ nhận hàng
                                            </strong>để biết chính xác thời gian giao</h4>
                                        <label for="checkbox_header_adress_detail_input_province"
                                            class="header_adress_detail_input_province">
                                            <span>Hồ Chí Minh</span>
                                            <i class="fas fa-sort-down"></i>
                                        </label>
                                        <input type="checkbox" hidden id="checkbox_header_adress_detail_input_province"
                                            class="checkbox_header_adress_detail_input_province">
                                        <div class="header_adress_detail_body_showprovince">
                                            <div class="header_adress_detail_body_showprovince_search">
                                                <i class="fas fa-search"></i>
                                                <input type="text" placeholder="Nhập để tìm kiếm">
                                            </div>
                                            <ul class="header_adress_detail_body_showprovince_list">
                                                <li class="header_adress_detail_body_showprovince_link"><a
                                                        href="#"><strong>Hà Nội</strong></a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showprovince_link"><a href="#">Hà
                                                        Nội</a></li>
                                            </ul>
                                        </div>
                                        <label for="checkbox_header_adress_detail_input_district"
                                            class="header_adress_detail_input_district">
                                            <span>Quận 1</span>
                                            <i class="fas fa-sort-down"></i>
                                        </label>
                                        <input type="checkbox" hidden id="checkbox_header_adress_detail_input_district"
                                            class="checkbox_header_adress_detail_input_district">
                                        <div class="header_adress_detail_body_showdistrict">
                                            <div class="header_adress_detail_body_showdistrict_search">
                                                <i class="fas fa-search"></i>
                                                <input type="text" placeholder="Nhập để tìm kiếm">
                                            </div>
                                            <ul class="header_adress_detail_body_showdistrict_list">
                                                <li class="header_adress_detail_body_showdistrict_link"><a
                                                        href="#"><strong>Hà Nội</strong></a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Quận
                                                        1</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showdistrict_link"><a href="#">Hà
                                                        Nội</a></li>
                                            </ul>
                                        </div>
                                        <label for="checkbox_header_adress_detail_input_ward"
                                            class="header_adress_detail_input_ward">
                                            <span>Phường Nguyễn Thái Bình</span>
                                            <i class="fas fa-sort-down"></i>
                                        </label>
                                        <input type="checkbox" hidden id="checkbox_header_adress_detail_input_ward"
                                            class="checkbox_header_adress_detail_input_ward">

                                        <div class="header_adress_detail_body_showward">
                                            <div class="header_adress_detail_body_showward_search">
                                                <i class="fas fa-search"></i>
                                                <input type="text" placeholder="Nhập để tìm kiếm">
                                            </div>
                                            <ul class="header_adress_detail_body_showward_list">
                                                <li class="header_adress_detail_body_showward_link"><a
                                                        href="#"><strong>Hà Nội</strong></a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Phường
                                                        Nguyễn Thái Bình</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                                <li class="header_adress_detail_body_showward_link"><a href="#">Hà
                                                        Nội</a></li>
                                            </ul>
                                        </div>
                                        <input type="text" class="header_adress_detail_input_apartment_number"
                                            placeholder="Nhập số nhà, tên đường (Không bắt buộc)">
                                    </div>
                                    <button class="header_form_confilm">
                                        Xác nhận
                                    </button>
                                </div>
                            </form>
                          
                            <form action="" class="header_search">
                                <input class="show_on_mobile" onclick="search_on_mobile()" type="text" placeholder="Bạn tìm gì...">
                                <input class="hidden_on_mobile" type="text" placeholder="Bạn tìm gì...">
                                <button><i class="fas fa-search"></i></button>
                            </form>

                            <a href="cart.html" class="header_cart" id="header_cart">
                                <i class="show_on_mobile fas fa-shopping-cart"></i>
                                <span class="number">1</span>
                                <span class="hidden_on_mobile">Giỏ hàng</span>
                                <div class="header_cart-overlay"></div>
                            </a>
                            <a href="#" class=" header_cart-history" id="header_cart-history">
                                Lịch sử đơn hàng
                            </a>
                            <label onclick="show_tab_on_mobile()" for="check_menu_list_on_mobile" class="menu_list_on_mobile" id="menu_list_on_mobile">
                                <i class="fas fa-bars"></i>
                                <Span>Menu</Span>
                            </label>
                            <input type="checkbox" hidden id="check_menu_list_on_mobile" class="check_menu_list_on_mobile">
                            <div class="menu_option_list_on_mobile">
                                <div class="menu_list_close">
                                    <label for="check_menu_list_on_mobile" class="menu_list_close-icon">
                                        <i class="fas fa-times"></i>
                                        <span>Đóng</span>
                                    </label>
                                </div>
                                <div class="menu_list_header">
                                    <ul class="meunu_list_list">
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>
                                        <li class="menu_list_item">
                                            <a href="#" class="menu_list_link">Đồng Hồ</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="menu_list_body">
                                    <ul class="menu_body_list">
                                        <li class="menu_list_body_item">
                                            <span><strong>Nhóm hàng mới</strong></span>
                                        </li>
                                        <li class="menu_list_body_item">
                                            <a href="#" class="menu_list_body_link">Phụ kiện ô tô</a>
                                        </li>
                                        <li class="menu_list_body_item">
                                            <a href="#" class="menu_list_body_link">Phụ kiện ô tô</a>
                                        </li>
                                        <li class="menu_list_body_item">
                                            <a href="#" class="menu_list_body_link">Phụ kiện ô tô</a>
                                        </li>
                                        <li class="menu_list_body_item">
                                            <a href="#" class="menu_list_body_link">Phụ kiện ô tô</a>
                                        </li>
                                        <li class="menu_list_body_item">
                                            <span><strong>Nhóm hàng mới</strong></span>
                                        </li>
                                        <li class="menu_list_body_item">
                                            <a href="#" class="menu_list_body_link">Phụ kiện ô tô</a>
                                        </li>
                                        <li class="menu_list_body_item">
                                            <a href="#" class="menu_list_body_link">Phụ kiện ô tô</a>
                                        </li>
                                        <li class="menu_list_body_item">
                                            <a href="#" class="menu_list_body_link">Phụ kiện ô tô</a>
                                        </li>
                                        <li class="menu_list_body_item">
                                            <a href="#" class="menu_list_body_link">Phụ kiện ô tô</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="hidden_on_mobile header_search_right">
                            <a href="#" class="header_search_right-product">24h <br> Công nghệ</a>
                            <a href="#" class="header_search_right-product"><br>Hỏi Đáp</a>
                            <a href="#" class="header_search_right-product"><br>Game App</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end-header-with-search--------->
            <!-- start-navbar-bottom----------------->
            <div class="hidden_on_mobile header_navbar_bottom grid wide">
                <ul class="header_navbar_list">
                    <li class="header_navbar_item">
                        <a href="#" class="header_navbar_link"><i class="fas fa-phone"></i> Điện thoại</a>
                    </li>
                    <li class="header_navbar_item">
                        <a href="#" class="header_navbar_link"><i class="fas fa-laptop"></i> Laptop</a>
                    </li>
                    <li class="header_navbar_item">
                        <a href="#" class="header_navbar_link"><i class="fas fa-tablet-alt"></i> Tablet</a>
                    </li>
                    <li class="header_navbar_item header_navbar_acctive">
                        <a href="#" class="header_navbar_link"><i class="fas fa-headphones"></i> Phụ kiện <i
                                class="fas fa-caret-down"></i></a>
                        <div class="header_navbar_accessory">
                            <div class="header_accessory-item-group">
                                <h3>Phụ kiện di động</h3>
                                <ul class="header_accessory_list">
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Pin sạc dự phòng</a>
                                    </li>
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Cáp sạc</a>
                                    </li>
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Màn hình</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header_accessory-item-group">
                                <h3>Phụ kiện di động</h3>
                                <ul class="header_accessory_list">
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Pin sạc dự phòng</a>
                                    </li>
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Cáp sạc</a>
                                    </li>
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Màn hình</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header_accessory-item-group">
                                <h3>Phụ kiện di động</h3>
                                <ul class="header_accessory_list">
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Pin sạc dự phòng</a>
                                    </li>
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Cáp sạc</a>
                                    </li>
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Màn hình</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="header_navbar_item">
                        <a href="#" class="header_navbar_link"><i class="far fa-clock"></i> Đồng hồ thông minh</a>
                    </li>
                    <li class="header_navbar_item">
                        <a href="#" class="header_navbar_link"><i class="far fa-clock"></i> Đồng hồ thông minh</a>
                    </li>
                    <li class="header_navbar_item header_navbar_item_PC">
                        <a href="#" class="header_navbar_link"><i class="fas fa-desktop"></i> PC, Máy in <i
                                class="fas fa-caret-down"></i>
                            <iclass="fas fa-caret-down"></i>
                        </a>
                        <div class="header_navbar_PC">
                            <div class="header_accessory-item-group">
                                <ul class="header_accessory_list">
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Pin sạc dự phòng</a>
                                    </li>
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Cáp sạc</a>
                                    </li>
                                    <li class="header_accessory_item">
                                        <a href="#" class="header_accessory_link">Màn hình</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="header_navbar_item">
                        <a href="#" class="header_navbar_link"> Máy cũ giá rẻ</a>
                    </li>
                    <li class="header_navbar_item">
                        <a href="#" class="header_navbar_link"> Sim, thẻ cào</a>
                        <span class="item_sale">Giảm 5%</span>
                    </li>
                    <li class="header_navbar_item">
                        <a href="#" class="header_navbar_link"> Trả góp, điện nước</a>
                    </li>
                </ul>
            </div>
            <!-- end navbar bottom--------------- -->
        </div>

        
        <!-- sticky_slidebar--
        <a href="#" class="hidden_on_mobile sticky_sidebar_left">
            <img src="<?php echo e(('public/frontend/assets/images/TraiTGDD-79x271.png')); ?>" alt="Photos">
        </a>
        <a href="#" class="hidden_on_mobile sticky_sidebar_right">
            <img src="<?php echo e(('public/frontend/assets/images/PhaiTGDD-79x271.png')); ?>" alt="Photos">
        </a> -->


        <!-- end--header-- -->
        <div class="content">
            <div class="grid wide">
                <!-- start-bar-top-- -->
                <div class="bartop">
                    <div class="row">
                        <div class="col l-8 c-12">
                            <div id="carousel_bartop" class="carousel slide carousel_bartop" data-ride="carousel">
                                <ul class="carousel-indicators ul_carousel_bartop">
                                    <li data-target="#carousel_bartop" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel_bartop" data-slide-to="1"></li>
                                    <li data-target="#carousel_bartop" data-slide-to="2"></li>
                                    <li data-target="#carousel_bartop" data-slide-to="3"></li>

                                  </ul>
                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active carousel_bartop_item">
                                        <a href="#">
                                            <img src="<?php echo e(('public/frontend/assets/images/830-300-830x300-6.png')); ?>" width="100%" height="350px"
                                                alt="Photos">
                                        </a>
                                    </div>
                                    <div class="carousel-item carousel_bartop_item">
                                        <a href="#">
                                            <img src="<?php echo e(('public/frontend/assets/images/830-300-830x300-8.png')); ?>" width="100%" height="350px"
                                                alt="Photos">
                                        </a>
                                    </div>
                                    <div class="carousel-item carousel_bartop_item">
                                        <a href="#">
                                            <img src="<?php echo e(('public/frontend/assets/images/big11-830-300-830x300.png')); ?>" width="100%"
                                                height="350px" alt="Photos">
                                        </a>
                                    </div>
                                    <div class="carousel-item carousel_bartop_item">
                                        <a href="#">
                                            <img src="<?php echo e(('public/frontend/assets/images/iphone-830-300-830x300.png')); ?>" width="100%"
                                                height="350px" alt="Photos">
                                        </a>
                                    </div>
                                    <div class="carousel-item carousel_bartop_item">
                                        <a href="#">
                                            <img src="<?php echo e(('public/frontend/assets/images/big11-830-300-830x300.png')); ?>" width="100%"
                                                height="350px" alt="Photos">
                                        </a>
                                    </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="carousel-control-prev carousel-content-group" href="#carousel_bartop"
                                    data-slide="prev">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a class="carousel-control-next carousel-content-group" href="#carousel_bartop"
                                    data-slide="next">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col l-4 c-0 ">
                            <div class="row">
                                <ul class="bar_list">
                                    <li class="bar_item">
                                        <a href="#" class="bar_link">
                                            <img src="<?php echo e(('public/frontend/assets/images/laptopdesk(3)-340x340.jpg')); ?>" width="185px"
                                                height="170px" alt="Photos">
                                        </a>
                                    </li>
                                    <li class="bar_item">
                                        <a href="#" class="bar_link">
                                            <img src="<?php echo e(('public/frontend/assets/images/laptopdesk(1)-340x340-1.jpg')); ?>" width="185px"
                                                height="170px" alt="Photos">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <ul class="bar_list">
                                    <li class="bar_item">
                                        <a href="#" class="bar_link">
                                            <img src="<?php echo e(('public/frontend/assets/images/laptopdesk-340x340.jpg')); ?>" width="185px"
                                                height="170px" alt="Photos">
                                        </a>
                                    </li>
                                    <li class="bar_item">
                                        <a href="#" class="bar_link">
                                            <img src="<?php echo e(('public/frontend/assets/images/Frame39712x-340x340.png')); ?>" width="185px"
                                                height="170px" alt="Photos">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- list product on mobile -->
                <div class="product_on_mobile">
                    <ul class="product_on_mobile_list">
                        <li class="product_on_mobile_item">
                            <a href="#" class="product_on_mobile_link">Điện thoại</a>
                        </li>
                        <li class="product_on_mobile_item">
                            <a href="#" class="product_on_mobile_link">Laptop</a>
                        </li>
                        <li class="product_on_mobile_item">
                            <a href="#" class="product_on_mobile_link">Điện thoại</a>
                        </li>
                        <li class="product_on_mobile_item">
                            <a href="#" class="product_on_mobile_link">Laptop</a>
                        </li>
                        <li class="product_on_mobile_item">
                            <a href="#" class="product_on_mobile_link">Điện thoại</a>
                        </li>
                        <li class="product_on_mobile_item">
                            <a href="#" class="product_on_mobile_link">Laptop</a>
                        </li>
                        <li class="product_on_mobile_item">
                            <a href="#" class="product_on_mobile_link">Điện thoại</a>
                        </li>
                        <li class="product_on_mobile_item">
                            <a href="#" class="product_on_mobile_link">Laptop</a>
                        </li>
                        <li class="product_on_mobile_item">
                            <a href="#" class="product_on_mobile_link">Điện thoại</a>
                        </li>
                        <li class="product_on_mobile_item">
                            <a href="#" class="product_on_mobile_link">Laptop</a>
                        </li>
                    </ul>
                </div>
                <!-- baner-- -->
                <a href="#" class="sub-banner">
                    <img src="<?php echo e(('public/frontend/assets/images/1200-44-1200x44-3.png')); ?>" alt="banner">
                </a>
                <!-- start_event_group -->
                <div class="content_group content_group_event">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>

                <!-- start_group_smart_phone -->
                
                <!-- start group accessory- -->
                
                <!-- start_trademark -->
                
                <!-- start technology and app----------- -->
               
            <!-- start_chatbox -->
            <label for="checkbox_chatbox" for="chatbox" class="chatbox">
                <i class="fas fa-comment-dots"></i>
            </label>
            <input id="checkbox_chatbox" hidden class="checkbox_chatbox" type="checkbox">
            <div class="dialog_chat">
                <div class="dialog_close">
                    <label for="checkbox_chatbox" class="icon_chatbox_close">
                        <i class="far fa-window-minimize"></i>
                    </label>
                </div>
                <form action="" class="dialog_body was-validated">
                    <div class="form-group form_body_dialogchat">
                        <label for="">Quý khách muốn xưng hô là:</label>
                        <select name="select" class="dialog_body_select">
                            <option value=1>Anh</option>
                            <option value=2>Chị</option>
                        </select>
                    </div>
                    <div class="form-group form_body_dialogchat">
                        <label for="uname">Tên của quý khách là:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Nhập tên của quý khách" name="uname"
                            required>
                        <div class="valid-feedback">Hoàn thành</div>
                        <div class="invalid-feedback">Vui lòng nhập đủ thông tin.</div>
                    </div>
                    <div class="form-group form_body_dialogchat">
                        <label for="numberphone">Số điện thoại của quý khách là:</label>
                        <input type="numberphone" class="form-control" id="numberphone" placeholder="Nhập số điện thoại của quý khách:" name="numberphone"
                            required>
                        <div class="valid-feedback">Hoàn thành</div>
                        <div class="invalid-feedback">Vui lòng nhập đủ thông tin.</div>
                    </div>
                    <div class="form-group form_body_dialogchat form-check">
                        <label class="form-check-label">
                            <input class="form-check-input form-check-input_body_dialogchat" type="checkbox" name="remember" required>   Bằng việc chọn bắt đầu chát, quý khách đồng ý với các điều khoản của Thegioidiong.com.
                            <div class="valid-feedback">Đồng ý</div>
                            <div class="invalid-feedback">Đồng ý để bắt đầu chát</div>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Bắt đầu chát</button>
                </form>
            </div>
        </div>
        <footer>
            <div class="grid wide">
                <div class="footer_body">
                    <div class="row">
                        <div class="col l-3 c-6">
                            <ul class="footer_body_list">
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Lịch sử mua hàng</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Cộng tác bán hàng cùng TGDĐ</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Tìm hiểu mua trả góp</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Chính sách bảo hành</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Xem thêm <i class="fas fa-caret-down"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col l-3 c-6">
                            <ul class="footer_body_list">
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Lịch sử mua hàng</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Cộng tác bán hàng cùng TGDĐ</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Tìm hiểu mua trả góp</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Chính sách bảo hành</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Xem thêm <i class="fas fa-caret-down"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col l-3 c-6">
                            <ul class="footer_body_list">
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link"><strong>Tổng đài hỗ trợ (Miễn phí
                                            gọi)</strong></a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Gọi mua: 180215464</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Kỹ thuật: 180215464</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Bảo hành: 180215464</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Khiếu nại: 180215464</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col l-3 c-6">
                            <ul class="footer_body_list">
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link"><i class="fab fa-facebook"></i> 3714K Fan</a>
                                    <a href="#" class="footer_body_link"><i class="fab fa-youtube"></i> 825K Đăng ký</a>
                                </li>
                                <li class="footer_body_item">
                                    <a href="#" class="footer_body_link">Website cùng tập đoàn</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer_bottom">
                <p>
                    © 2018. Công ty cổ phần Thế Giới Di Động. GPDKKD: 0303217354 do sở KH & ĐT TP.HCM cấp ngày
                    02/01/2007. GPMXH: 238/GP-BTTTT do Bộ Thông Tin và Truyền Thông cấp ngày 04/06/2020.</p>

                <p>
                    Địa chỉ: 128 Trần Quang Khải, P. Tân Định, Q.1, TP.Hồ Chí Minh. Điện thoại: 028 38125960. Email:
                    cskh@thegioididong.com. Chịu trách nhiệm nội dung: Huỳnh Văn Tốt. </p>
            </div>
        </footer>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\shopdienthoailaravel\resources\views/welcome.blade.php ENDPATH**/ ?>