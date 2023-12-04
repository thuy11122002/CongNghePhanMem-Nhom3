@extends('layout')
@section('content')

<div class="container search_avanced">
    <div class="row" id="filter">
        <form style="width: 100%;" action="{{URL::to('/tim-kiem-nang-cao')}}" method="post">
            {{csrf_field()}}

            @php
            $category_name1 = 'Chọn danh mục';
            if($category_words == 12){
            $category_name1 = 'Điện thoại';
            }elseif($category_words == 13){
            $category_name1 = 'Âm thanh';
            }elseif($category_words == 14){
            $category_name1 = 'Phụ kiện';
            }elseif($category_words == 15){
            $category_name1 = 'Khuyến mãi';
            }

            $brand_name1 = 'Chọn thương hiệu';
            if($brand_words == 1){
            $brand_name1 = 'SAMSUNG';
            }elseif($brand_words == 3){
            $brand_name1 = 'iPhone';
            }elseif($brand_words == 4){
            $brand_name1 = 'OPPO';
            }elseif($brand_words == 5){
            $brand_name1 = 'VIVO';
            }elseif($brand_words == 6){
            $brand_name1 = 'realme';
            }

            $price_text = 'Sắp xếp theo giá tiền';
            if($price_words == 1){
            $price_text = 'Giá từ thấp đến cao';
            }elseif($price_words == 2){
            $price_text = 'Giá từ cao xuống thấp';
            }
            @endphp
            <div class="form-group col-xs-6 col-sm-3">
                <select data-filter="make" class="filter-make filter form-control" name="category_submit">
                    <option value="{{$category_words}}">{{$category_name1}}</option>
                    <option value="12">Điện thoại</option>
                    <option value="13">Âm thanh</option>
                    <option value="14">Phụ kiện</option>
                    <option value="15">Khuyến mãi</option>
                </select>
            </div>

            <div class="form-group col-xs-6 col-sm-3">
                <select data-filter="model" class="filter-model filter form-control" name="brand_submit">
                    <option value="{{$brand_words}}">{{$brand_name1}}</option>
                    <option value="3">iPhone</option>
                    <option value="1">SAMSUNG</option>
                    <option value="4">OPPO</option>
                    <option value="5">VIVO</option>
                    <option value="6">realme</option>

                </select>
            </div>

            <div class="form-group col-xs-6 col-sm-3">
                <select data-filter="price" class="filter-price filter form-control" name="price_submit">
                    <option value="{{$price_words}}">{{$price_text}}</option>
                    <option value="1">Từ thấp đến cao</option>
                    <option value="2">Từ cao đến thấp</option>

                </select>
            </div>

            <div class="form-group col-xs-2 col-sm-2">
                <button type="submit" class="btn btn-primary">Lọc</button>
            </div>

        </form>
    </div>
</div>


<!-- tim kiem nang cao mobile -->
<div class="container search_avanced_mobile">
    <div class="row" id="filter">
        <form style="width: 100%;" action="{{URL::to('/tim-kiem-nang-cao')}}" method="post">
            {{csrf_field()}}

            @php
            $category_name1 = 'Chọn danh mục';
            if($category_words == 12){
            $category_name1 = 'Điện thoại';
            }elseif($category_words == 13){
            $category_name1 = 'Âm thanh';
            }elseif($category_words == 14){
            $category_name1 = 'Phụ kiện';
            }elseif($category_words == 15){
            $category_name1 = 'Khuyến mãi';
            }

            $brand_name1 = 'Chọn thương hiệu';
            if($brand_words == 1){
            $brand_name1 = 'SAMSUNG';
            }elseif($brand_words == 3){
            $brand_name1 = 'iPhone';
            }elseif($brand_words == 4){
            $brand_name1 = 'OPPO';
            }elseif($brand_words == 5){
            $brand_name1 = 'VIVO';
            }elseif($brand_words == 6){
            $brand_name1 = 'realme';
            }

            $price_text = 'Sắp xếp theo giá tiền';
            if($price_words == 1){
            $price_text = 'Thấp-Cao';
            }elseif($price_words == 2){
            $price_text = 'Cao-Thấp';
            }
            @endphp

            <div class="form-group col-xs-3 cate-group" style="width: 83px">
                <select data-filter="make" class="filter-make filter form-control" name="category_submit">
                    
                    <option value="{{$category_words}}">{{$category_name1}}</option>
                    <option value="12">Điện thoại</option>
                    <option value="13">Âm thanh</option>
                    <option value="14">Phụ kiện</option>
                    <option value="15">Khuyến mãi</option>
                </select>
            </div>

            <div class="form-group col-xs-3 cate-group" style="width: 115px">
            <select data-filter="model" class="filter-model filter form-control" name="brand_submit">
                    <option value="{{$brand_words}}">{{$brand_name1}}</option>
                    <option value="3">iPhone</option>
                    <option value="1">SAMSUNG</option>
                    <option value="4">OPPO</option>
                    <option value="5">VIVO</option>
                    <option value="6">realme</option>

                </select>
            </div>

            <div class="form-group col-xs-3 cate-group" style="width: 67px">
            <select data-filter="price" class="filter-price filter form-control" name="price_submit">
                    <option value="{{$price_words}}">{{$price_text}}</option>
                    <option value="1">Thấp-Cao</option>
                    <option value="2">Cao-Thấp</option>

                </select>
            </div>
            
            <div class="form-group col-xs-6 btn_search_mobile" style="margin-left: 47px;">
                <button type="submit" class="btn btn-primary">Lọc</button>
            </div>

        </form>
    </div>
</div>
<!--  -->

<div class="content_group">
    <div class="content_group-title">
        <h1>Kết quả tìm kiếm: </h1>
    </div>
    <h3>Tìm thấy: {{count($search_product)}} kết quả</h3>

    <div class="row row_main_content content_group-body">
        @foreach($search_product as $key => $product)

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
        @endforeach
    </div>

    <div class="show_on_mobile show_all_item">
        <a class="" href="#">
            <span>Xem tất cả <b>179</b> điện thoại</span>
        </a>
    </div>
</div>
@endsection