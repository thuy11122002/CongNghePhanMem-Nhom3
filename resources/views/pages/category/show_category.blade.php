<!-- start_event_group -->
@extends('layout')
@section('content')

<!-- start_event_group -->

<!-- smartphone hot -->
<div class="content_group">
                    <div class="content_group-title">
                        
                        @foreach($category_name as $key => $name)
                        <h1>DANH MỤC: {{($name->category_name)}}</h1> 
                        <?php
                            $danhmuc = $name->category_name ;
                        ?>
                        @endforeach
                        <ul>
                            @foreach($brand as $key => $brand)
                            <li>
                                <a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">
                                    @php
                                    if($danhmuc == 'Âm thanh'){
                                        if($brand->brand_name == 'iPhone')
                                                $brand->brand_name = 'Apple';
                                    }
                                        
                                    @endphp
                                    <span>{{($brand->brand_name)}}</span>
                                </a>
                            </li>
                            
                            @endforeach
                            <!-- <div class="hidden_on_mobile">
                                <li>
                                    < <a href="#">
                                
                                        <span>Xem tất cả <b>179</b> điện thoại</span>
                                    </a>
                                </li>
                            </div>  -->
                        </ul>
                    </div>

                    <div class="row row_main_content content_group-body">
                        @foreach($category_by_id as $key => $product)
                        <div class="col col_main_content l-2-4 c-4">
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="group_item">
                                <span class="installment">Trả góp 0%</span>
                                <img class="group_item-img"
                                    src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="Photos">
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