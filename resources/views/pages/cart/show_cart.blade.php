@extends('layout')
@section('content')

<style>
    .sub-banner {
        display: none;
    }

    .bartop {
        display: none;
    }

    .content {
        padding: 10px 0 110px 0;
    }
</style>

<div class="cart_section cart">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Giỏ hàng</div>
                    <!-- <small> (1 item in your cart) </small> -->

                    <div class="cart_items">
                        <ul class="cart_list">
                            <?php
                            $content = Cart::content();
                            // echo '<pre>';
                            // print_r($content);
                            // echo '</pre>';
                            ?>
                            @foreach($content as $v_content)
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col" style="width: 200px;">
                                        <div class="cart_item_title">Tên sản phẩm</div>
                                        <div class="cart_item_text">{{$v_content->name}}</div>
                                    </div>

                                    <div class="cart_item_price cart_info_col" style="">
                                        <div class="cart_item_title">Số tiền</div>
                                        <div class="cart_item_text">{{number_format($v_content->price).' '.'VNĐ'}}</div>
                                    </div>

                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Số lượng</div>
                                        <form action="{{URL::to('/update-cart-quantity')}}" method="post">
                                            {{csrf_field(URL::to('/update-cart-quantity'))}}
                                            <div class="cart_item_text">
                                                <input type="text" name="cart_quantity" value="{{$v_content->qty}}" style="width: 50px">
                                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart">
                                                <input type="submit" value="Cập nhật" name="update_qty" class="">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="cart_item_price cart_info_col" style="">
                                        <div class="cart_item_title">Tổng tiền</div>
                                        <div class="cart_item_text">
                                            <?php
                                            $subtotal = $v_content->price * $v_content->qty;
                                            echo number_format($subtotal) . ' ' . 'VNĐ';
                                            ?>
                                        </div>
                                    </div>

                                    <div class="cart_item_total cart_info_col" style="width: 60px">
                                        <div class="cart_item_title">Thao tác</div>
                                        <div class="cart_item_text">
                                            <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-x fa-sm"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Tổng hóa đơn:</div>
                            <div class="order_total_amount">
                                {{Cart::subtotal().' '.'VNĐ'}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <div class="cart_buttons">
            <a href="{{ URL::to('/trang-chu') }}">
                <button type="button" class="button cart_button_clear" style="float: left">Quay lại Trang Chủ</button>
            </a>

            <?php
            $customer_id = Session::get('customer_id');
            if ($customer_id != null) {
            ?>
                <a href="{{ URL::to('/checkout') }}" class="button cart_button_checkout" id="" style="float: right">
                    Thanh toán
                </a>
            <?php
            } else {
            ?>
                <a href="{{ URL::to('/login-checkout') }}" class="button cart_button_checkout" id="" style="float: right">
                    Thanh toán
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<div class="cart_section cart_mobile">
    <div class="container-fluid">
        <div class="row">

            <div class="cart_container">
                <div class="cart_title" style="font-size: 1.7rem;font-weight: 500;">Giỏ hàng</div>
                <!-- <small> (1 item in your cart) </small> -->

                <div class="cart_items">
                    <ul class="cart_list">
                        <?php
                        $content = Cart::content();
                        // echo '<pre>';
                        // print_r($content);
                        // echo '</pre>';
                        ?>
                        @foreach($content as $v_content)
                        <li class="cart_item clearfix">
                        <div class="cart_item_total cart_info_col" style="float: left">
                                <!-- <div class="cart_item_title" style="font-size: 12px;margin-top: 0px">Thao tác</div> -->
                                <div class="cart_item_text" style="font-size: 12px;margin-top: 20px">
                                    <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-x fa-sm" style="color: red;"></i></a>
                                </div>
                            </div>
                            <div class="cart_item_image" style="width: 80px;height: 133px;;"><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" style="width: 100%" alt=""></div>
                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between" style="width: calc(100% - 133px);float: left;padding-top: 0px;">
                                <div class="cart_item_name cart_info_col">
                                    <!-- <div class="cart_item_title">Tên sản phẩm</div> -->
                                    <div class="cart_item_text" style="font-size: 12px;margin-top: 0px;width: 150px; font-weight: 600">{{$v_content->name}}</div>
                                </div>

                                <div class="cart_item_price cart_info_col" style="width: 150px;">
                                    <!-- <div class="cart_item_title">Số tiền</div> -->
                                    <div class="cart_item_text" style="font-size: 12px;margin-top: 0px;width: 92px; color: red">{{number_format($v_content->price).' '.'VNĐ'}}</div>
                                </div>

                                <div class="cart_item_quantity cart_info_col" style="width: 150px; margin-left: 5px">
                                    <!-- <div class="cart_item_title" style="font-size: 12px;margin-top: 0px">Số lượng</div> -->
                                    <form action="{{URL::to('/update-cart-quantity')}}" method="post">
                                        {{csrf_field(URL::to('/update-cart-quantity'))}}
                                        <div class="cart_item_text" style="font-size: 12px;margin-top: 0px">
                                            <input type="text" name="cart_quantity" value="{{$v_content->qty}}" style="width: 50px">
                                            <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart">
                                            <input type="submit" value="Cập nhật" name="update_qty" class="">
                                        </div>
                                    </form>
                                </div>



                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="order_total" style="width: 100%;
                height: 60px;
                margin-top: 30px;
                border: solid 1px #e8e8e8;
                box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
                padding-right: 35px;
                padding-left: 15px;
                background-color: #fff;">
                    <div class="order_total_content text-md-right" style="width: 140%">
                        <div class="order_total_title" style="font-size: 14px;">Tổng hóa đơn:</div>
                        <div class="order_total_amount" style="font-size: 14px; margin-left: 0px;">
                            {{Cart::subtotal().' '.'VNĐ'}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--  -->
        <div class="cart_buttons">
            <a href="{{ URL::to('/trang-chu') }}">
                <button type="button" class="button cart_button_clear" style="float: left;">
                    <i class="fa-solid fa-arrow-left"></i></button>
            </a>

            <?php
            $customer_id = Session::get('customer_id');
            if ($customer_id != null) {
            ?>
                <a href="{{ URL::to('/checkout') }}" class="button cart_button_checkout" id="" style="float: right; font-size: 12px;  background-color: #f04949">
                    Thanh toán
                </a>
            <?php
            } else {
            ?>
                <a href="{{ URL::to('/login-checkout') }}" class="button cart_button_checkout" id="" style="float: right; font-size: 12px;  background-color: #f04949">
                    Thanh toán
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>


<style>
    * {
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
        -webkit-text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
        text-shadow: rgba(0, 0, 0, .01) 0 0 1px
    }

    body {
        font-family: 'Rubik', sans-serif;
        font-size: 14px;
        font-weight: 400;
        color: #000000
    }

    ul {
        list-style: none;
        margin-bottom: 0px
    }

    .button {
        display: inline-block;
        background: #0e8ce4;
        border-radius: 5px;
        height: 48px;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease
    }

    .button a {
        display: block;
        font-size: 18px;
        font-weight: 400;
        line-height: 48px;
        color: #FFFFFF;
        padding-left: 35px;
        padding-right: 35px
    }

    .button:hover {
        opacity: 0.8
    }

    .cart_section {
        width: 100%;
        padding-top: 10px;
        padding-bottom: 50px
    }

    .cart_title {
        font-size: 30px;
        font-weight: 500
    }

    .cart_items {
        margin-top: 8px
    }

    .cart_list {
        border: solid 1px #e8e8e8;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        background-color: #fff
    }

    .cart_item {
        width: 100%;
        padding: 15px;
        padding-right: 46px;
        border-bottom: 1px solid grey;
    }

    .cart_item_image {
        width: 133px;
        height: 133px;
        float: left
    }

    .cart_item_image img {
        max-width: 150%
    }

    .cart_item_info {
        width: calc(100% - 133px);
        float: left;
        padding-top: 18px
    }

    .cart_item_name {
        margin-left: 7.53%
    }

    .cart_item_title {
        font-size: 14px;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.5)
    }

    .cart_item_text {
        font-size: 18px;
        margin-top: 35px
    }

    .cart_item_text span {
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin-right: 11px;
        -webkit-transform: translateY(4px);
        -moz-transform: translateY(4px);
        -ms-transform: translateY(4px);
        -o-transform: translateY(4px);
        transform: translateY(4px)
    }

    .cart_item_price {
        text-align: right
    }

    .cart_item_total {
        text-align: right
    }

    .order_total {
        width: 100%;
        height: 60px;
        margin-top: 30px;
        border: solid 1px #e8e8e8;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        padding-right: 46px;
        padding-left: 15px;
        background-color: #fff
    }

    .order_total_title {
        display: inline-block;
        font-size: 14px;
        color: rgba(0, 0, 0, 0.5);
        line-height: 60px
    }

    .order_total_amount {
        display: inline-block;
        font-size: 18px;
        font-weight: 500;
        margin-left: 26px;
        line-height: 60px
    }

    .cart_buttons {
        padding-top: 50px;
    }

    .cart_button_clear {
        display: inline-block;
        border: none;
        font-size: 18px;
        font-weight: 400;
        line-height: 48px;
        color: rgba(0, 0, 0, 0.5);
        background: #FFFFFF;
        border: solid 1px #b2b2b2;
        padding-left: 35px;
        padding-right: 35px;
        outline: none;
        cursor: pointer;
        margin-right: 26px
    }

    .cart_button_clear:hover {
        border-color: #0e8ce4;
        color: #0e8ce4
    }

    .cart_button_checkout {
        display: inline-block;
        border: none;
        font-size: 18px;
        font-weight: 400;
        line-height: 48px;
        color: #FFFFFF;
        padding-left: 35px;
        padding-right: 35px;
        outline: none;
        cursor: pointer;
        vertical-align: top
    }
</style>

@endsection