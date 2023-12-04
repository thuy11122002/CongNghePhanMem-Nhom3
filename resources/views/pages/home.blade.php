<!-- start_event_group -->
@extends('layout')
@section('content')

<!-- start_event_group -->
<style>
    .content{
        padding: 0 0 50px 0;
    }
</style>
<!-- smartphone hot -->
<div class="content_group">
    <div class="content_group-title">
        <h1>ĐIỆN THOẠI NỔI BẬT NHẤT</h1>
        <ul>
            @php
            $new_varriable = 12;
            @endphp
            @foreach($brand as $key => $brandItem)

            <li>
                <a href="{{URL::to('/thuong-hieu-san-pham/'.$brandItem->brand_id.'?new_varriable='.$new_varriable)}}">
                    <span>{{($brandItem->brand_name)}}</span>
                </a>
            </li>

            @endforeach
        </ul>
    </div>

    <div class="row row_main_content content_group-body">
        @foreach($all_product as $key => $product)
        @if($product->category_id == 12)
        <!-- 12 dien thoai -->
        <div class="col col_main_content l-2-4 c-4" id="product">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="group_item">
                <span class="installment">Trả góp 0%</span>
                <img class="group_item-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="Photos">
                <div class="group_item-body" style="height: 184px;">
                    <span class="group_item_event-sale">11.11 siêu sale</span>
                    <h3 class="group_item-body_name">
                        {{($product->product_name)}}
                    </h3>
                    <ul class="group_item-body_tag">
                        <li><span>Ram 8 GB</span></li>
                        <li><span>SSD 256 GB</span></li>
                    </ul>
                    <p class="item_txt_online">Online giá rẻ</p>
                    <!-- <span class="group_item_total_price"><strike>20.000000đ</strike></span> -->
                    <!-- <span class="group_item_total_sale">20%</span> -->
                    <span class="group_item_price"><strong>{{number_format($product->product_price).' '.'VNĐ'}}</strong></span>
                    <ul class="group_item_review">
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star-half-alt"></i>
                        </li>
                        <li class="group_item_number_overrate">
                            <p>40</p>
                        </li>
                    </ul>
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>

    <div class="show_on_mobile show_all_item">
        <a class="" href="#">
            <span>Xem tất cả <b>179</b> điện thoại</span>
        </a>
    </div>
</div>
<!-- smartphone hot -->

<!-- headphone and adapter -->
<div class="content_group">
    <div class="content_group-title">
        <h1>Tai nghe</h1>
        <ul>
            @php
            $new_varriable = 13;
            @endphp
            @foreach($brand as $key => $brandItem2)
            <li>
                <a href="{{URL::to('/thuong-hieu-san-pham/'.$brandItem2->brand_id.'?new_varriable='.$new_varriable)}}">
                    @php
                    if($new_varriable == 13){
                    if($brandItem2->brand_name == 'iPhone')
                    $brandItem2->brand_name = 'Apple';
                    }
                    @endphp
                    <span>{{($brandItem2->brand_name)}}</span>
                </a>
            </li>
            @endforeach
        </ul>

    </div>
    <div class="row row_main_content content_group-body">
        @foreach($all_product as $key => $product)
        @if($product->category_id == 13)
        <!-- 13 la am thanh -->
        <div class="col col_main_content l-2-4 c-4">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="group_item">
                <span class="installment">Trả góp 0%</span>
                <img class="group_item-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="Photos">
                <div class="group_item-body">
                    <span class="group_item_event-sale">11.11 siêu sale</span>
                    <h3 class="group_item-body_name">
                        {{($product->product_name)}}
                    </h3>
                    <ul class="group_item-body_tag">
                        <li><span>Ram 8 GB</span></li>
                        <li><span>SSD 256 GB</span></li>
                    </ul>
                    <p class="item_txt_online">Online giá rẻ</p>
                    <!-- <span class="group_item_total_price"><strike>20.000000đ</strike></span> -->
                    <!-- <span class="group_item_total_sale">20%</span> -->
                    <span class="group_item_price"><strong>{{number_format($product->product_price).' '.'VNĐ'}}</strong></span>
                    <ul class="group_item_review">
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star-half-alt"></i>
                        </li>
                        <li class="group_item_number_overrate">
                            <p>40</p>
                        </li>
                    </ul>
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
</div>
<div class="show_on_mobile_flex show_all_item">
    <a class="" href="#">
        <span>Xem tất cả <b>179</b> Tai nghe</span>
    </a>
</div>


<!-- phu kien -->
<div class="content_group">
    <div class="content_group-title">
        <h1>PHỤ KIỆN NỔI BẬT</h1>
        <ul>
            @php
            $new_varriable = 14;
            @endphp

            @foreach($brand as $key => $brandItem3)
            <li>
                <a href="{{URL::to('/thuong-hieu-san-pham/'.$brandItem3->brand_id.'?new_varriable='.$new_varriable)}}">
                @php
                    if($brandItem3-> brand_name == 'Apple'){
                        $brandItem3-> brand_name= 'iPhone';
                    }    
                @endphp
                <span>{{($brandItem3->brand_name)}}</span>
                </a>
            </li>

            @endforeach
        </ul>
    </div>

   

    <div class="row row_main_content content_group-body">
        @foreach($all_product as $key => $product)
        @if($product->category_id == 14)
        <!-- 13 la am thanh -->
        <div class="col col_main_content l-2-4 c-4">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="group_item">
                <span class="installment">Trả góp 0%</span>
                <img class="group_item-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="Photos">
                <div class="group_item-body">
                    <span class="group_item_event-sale">11.11 siêu sale</span>
                    <h3 class="group_item-body_name">
                        {{($product->product_name)}}
                    </h3>
                    <ul class="group_item-body_tag">
                        <li><span>Ram 8 GB</span></li>
                        <li><span>SSD 256 GB</span></li>
                    </ul>
                    <p class="item_txt_online">Online giá rẻ</p>
                    <!-- <span class="group_item_total_price"><strike>20.000000đ</strike></span> -->
                    <!-- <span class="group_item_total_sale">20%</span> -->
                    <span class="group_item_price"><strong>{{number_format($product->product_price).' '.'VNĐ'}}</strong></span>
                    <ul class="group_item_review">
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star-half-alt"></i>
                        </li>
                        <li class="group_item_number_overrate">
                            <p>40</p>
                        </li>
                    </ul>
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
</div>
<div class="show_on_mobile_flex show_all_item">
    <a class="" href="#">
        <span>Xem tất cả <b>179</b> phụ kiện</span>
    </a>
</div>

<!-- Khuyến mãi -->
<div class="content_group">
    <div class="content_group-title">
        <h1>SẢN PHẨM KHUYẾN MÃI</h1>
        <ul>
            @php
            $new_varriable = 15;
            @endphp

            @foreach($brand as $key => $brandItem4)
            <li>
                <a href="{{URL::to('/thuong-hieu-san-pham/'.$brandItem4->brand_id.'?new_varriable='.$new_varriable)}}">
                
                <span>{{($brandItem4->brand_name)}}</span>
                </a>
            </li>

            @endforeach
        </ul>
    </div>

   

    <div class="row row_main_content content_group-body">
        @foreach($all_product as $key => $product)
        @if($product->category_id == 15)
        <!-- 13 la am thanh -->
        <div class="col col_main_content l-2-4 c-4">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="group_item">
                <span class="installment">Trả góp 0%</span>
                <img class="group_item-img" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="Photos">
                <div class="group_item-body">
                    <span class="group_item_event-sale">11.11 siêu sale</span>
                    <h3 class="group_item-body_name">
                        {{($product->product_name)}}
                    </h3>
                    <ul class="group_item-body_tag">
                        <li><span>Ram 8 GB</span></li>
                        <li><span>SSD 256 GB</span></li>
                    </ul>
                    <p class="item_txt_online">Online giá rẻ</p>
                    <span class="group_item_total_price"><strike>20.000000đ</strike></span>
                    <span class="group_item_total_sale">20%</span>
                    <span class="group_item_price"><strong>{{number_format($product->product_price).' '.'VNĐ'}}</strong></span>
                    <ul class="group_item_review">
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star"></i>
                        </li>
                        <li class="group_item_star">
                            <i class="fas fa-star-half-alt"></i>
                        </li>
                        <li class="group_item_number_overrate">
                            <p>40</p>
                        </li>
                    </ul>
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
</div>
<div class="show_on_mobile_flex show_all_item">
    <a class="" href="#">
        <span>Xem tất cả <b>179</b> phụ kiện</span>
    </a>
</div>


</div>
<!-- brand -->

<!-- </div> -->

@endsection