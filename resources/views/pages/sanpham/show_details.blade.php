@extends('layout')
@section('content')

<style>
    .sub-banner{
        display: none;
    }
    .bartop{
        display: none;
    }
    .content{
    background-color: #ffffff;
    margin: 0 0;
}
</style>

@foreach($product_details as $key => $value)
        <div class="container details">
        	<div class="row">
                <div class="col-xs-5 item-photo">
                    <img style="max-width:100%;" src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" />
                </div>
                
                <div class="col-xs-7" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3>{{$value->product_name}}</h3>    
                    <h5 style="color:#337ab7">Thương hiệu: {{$value->brand_name}}<a href="#"></a> ·  <style ="color:#337ab7"></style></h5>
                    <h5 style="color:#337ab7">Danh mục: {{$value->category_name}}<a href="#"></a> ·  <style ="color:#337ab7"></style></h5>
                    
                    <form action="{{URL::to('/save-cart/')}}" method="post">
                        {{csrf_field()}}
                    <!-- Precios -->
                    <h4 class="title-price">GIÁ</h4>
                    <h3 style="margin-top:0px;">{{number_format($value->product_price).' '.'VNĐ'}}</h3>
        
                    <!-- Detalles especificos del producto -->
                    <div class="section">
                        <h6 class="title-attr" style="margin-top:15px;" >MÀU SẮC</h6>                    
                        <div>
                            <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:25px;background:white;"></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:5px;">
                        <h6 class="title-attr">RAM</h6>                    
                        <div>
                            <div class="attr2">16 GB</div>
                            <div class="attr2">32 GB</div>
                        </div>
                    </div>   
                    

                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr">SỐ LƯỢNG</h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input name="qty" value="1"/>
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>

                    </div>   
                    
                    <input name="productid_hidden" type="hidden" value="{{$value->product_id}}"/>

                    <div class="section" style="padding-bottom:10px;">
                        <h5 class="title-attr">Số sản phẩm có sẵn: {{$value->product_qty}}</h5>                       
                    </div>   

                    <script>
                        $('form').submit(function(event) {
                            var qty = parseInt($('input[name="qty"]').val()); // Lấy giá trị số lượng sản phẩm người dùng nhập vào
                            var max_qty = {{$value->product_qty}}; // Lấy giá trị số lượng sản phẩm có sẵn từ PHP
                            if (qty > max_qty) {
                                event.preventDefault(); // Ngăn không cho form gửi đi nếu số lượng sản phẩm vượt quá số lượng có sẵn
                                if (confirm('Số lượng sản phẩm vượt quá số lượng có sẵn. Bạn có muốn đặt theo số lượng có sẵn không?')) {
                                    $('input[name="qty"]').val(max_qty); // Nếu người dùng đồng ý thì gán giá trị số lượng sản phẩm là số lượng tối đa có sẵn
                                }
                            }
                        });
                    </script>

                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <button type="submit" class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Thêm vào giỏ hàng</button>
                    </div>   
                    
                    </form>
                </div>                              
        
                <div class="col-xs-12">
                    <ul class="menu-items">
                        <li class="active">Thông tin sản phẩm</li>
                    </ul>
                    <div style="width:100%;border-top:1px solid silver; padding: 15px;">
                        <p>

                           {{$value->product_desc}}
                            
                        </p>
                            {{$value->product_content}}
                        
                        
                            <ul>
                                <br>
                                <li>Super AMOLED capacitive touchscreen display with 16M colors</li>
                                <li>Available on GSM, AT T, T-Mobile and other carriers</li>
                                <li>Compatible with GSM 850 / 900 / 1800; HSDPA 850 / 1900 / 2100 LTE; 700 MHz Class 17 / 1700 / 2100 networks</li>
                                <li>MicroUSB and USB connectivity</li>
                                <li>Interfaces with Wi-Fi 802.11 a/b/g/n/ac, dual band and Bluetooth</li>
                                <li>Wi-Fi hotspot to keep other devices online when a connection is not available</li>
                                <li>SMS, MMS, email, Push Mail, IM and RSS messaging</li>
                                <li>Front-facing camera features autofocus, an LED flash, dual video call capability and a sharp 4128 x 3096 pixel picture</li>
                                <li>Features 16 GB memory and 2 GB RAM</li>
                                <li>Upgradeable Jelly Bean v4.2.2 to Jelly Bean v4.3 Android OS</li>
                                <li>17 hours of talk time, 350 hours standby time on one charge</li>
                                <li>Available in white or black</li>
                                <li>Model I337</li>
                                <li>Package includes phone, charger, battery and user manual</li>
                                <li>Phone is 5.38 inches high x 2.75 inches wide x 0.13 inches deep and weighs a mere 4.59 oz </li>
                            </ul>  
                        
                    </div>
                </div>		
            </div>
        </div> 

        <!-- details on mobile -->
        <div class="container details_on_mobile">
        	<div class="row">
                <div class="col-xs-12 item-photo">
                    <img style="max-width:100%;" src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" />
                </div>
                
                <div class="col-xs-12" style="border:0px solid gray; margin-left: 25px">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3 style="font-size: 17px;"><b>{{$value->product_name}}</b></h3>    
                    <h5 style="color:#337ab7; font-size: 13px;">Thương hiệu: {{$value->brand_name}}<a href="#"></a> ·  <style ="color:#337ab7"></style></h5>
                    <h5 style="color:#337ab7; font-size: 13px;">Danh mục: {{$value->category_name}}<a href="#"></a> ·  <style ="color:#337ab7"></style></h5>
                    
                    <form action="{{URL::to('/save-cart/')}}" method="post">
                        {{csrf_field()}}
                    <!-- Precios -->
                    <h4 class="title-price" style="font-size: 16px;">GIÁ</h4>
                    <h3 style="margin-top:0px; font-size: 18px;"><b>{{number_format($value->product_price).' '.'VNĐ'}}</b></h3>
        
                    <!-- Detalles especificos del producto -->
                    <div class="section">
                        <h6 class="title-attr" style="margin-top:15px;" >MÀU SẮC</h6>                    
                        <div>
                            <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:25px;background:white;"></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:5px;">
                        <h6 class="title-attr">RAM</h6>                    
                        <div>
                            <div class="attr2">16 GB</div>
                            <div class="attr2">32 GB</div>
                        </div>
                    </div>   
                    

                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr">SỐ LƯỢNG</h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input name="qty" value="1"/>
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>

                    </div>   
                    
                    <input name="productid_hidden" type="hidden" value="{{$value->product_id}}"/>

                    <div class="section" style="padding-bottom:10px;">
                        <h5 class="title-attr">Số sản phẩm có sẵn: {{$value->product_qty}}</h5>                       
                    </div>   

                    <script>
                        $('form').submit(function(event) {
                            var qty = parseInt($('input[name="qty"]').val()); // Lấy giá trị số lượng sản phẩm người dùng nhập vào
                            var max_qty = {{$value->product_qty}}; // Lấy giá trị số lượng sản phẩm có sẵn từ PHP
                            if (qty > max_qty) {
                                event.preventDefault(); // Ngăn không cho form gửi đi nếu số lượng sản phẩm vượt quá số lượng có sẵn
                                if (confirm('Số lượng sản phẩm vượt quá số lượng có sẵn. Bạn có muốn đặt theo số lượng có sẵn không?')) {
                                    $('input[name="qty"]').val(max_qty); // Nếu người dùng đồng ý thì gán giá trị số lượng sản phẩm là số lượng tối đa có sẵn
                                }
                            }
                        });
                    </script>

                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <button type="submit" class="btn btn-success" style="margin-left: 0px; background-color: #f04949"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Thêm vào giỏ hàng</button>
                    </div>   
                    
                    </form>
                </div>                              
        
                <div class="col-xs-12">
                    <ul class="menu-items">
                        <li class="active" style="margin-left: -25px;">Thông tin sản phẩm</li>
                    </ul>
                    <div style="width:100%;border-top:1px solid silver; padding: 15px;">
                        <p>

                           {{$value->product_desc}}
                            
                        </p>
                            {{$value->product_content}}
                        
                        
                            <ul>
                                <br>
                                <li>Super AMOLED capacitive touchscreen display with 16M colors</li>
                                <li>Available on GSM, AT T, T-Mobile and other carriers</li>
                                <li>Compatible with GSM 850 / 900 / 1800; HSDPA 850 / 1900 / 2100 LTE; 700 MHz Class 17 / 1700 / 2100 networks</li>
                                <li>MicroUSB and USB connectivity</li>
                                <li>Interfaces with Wi-Fi 802.11 a/b/g/n/ac, dual band and Bluetooth</li>
                                <li>Wi-Fi hotspot to keep other devices online when a connection is not available</li>
                                <li>SMS, MMS, email, Push Mail, IM and RSS messaging</li>
                                <li>Front-facing camera features autofocus, an LED flash, dual video call capability and a sharp 4128 x 3096 pixel picture</li>
                                <li>Features 16 GB memory and 2 GB RAM</li>
                                <li>Upgradeable Jelly Bean v4.2.2 to Jelly Bean v4.3 Android OS</li>
                                <li>17 hours of talk time, 350 hours standby time on one charge</li>
                                <li>Available in white or black</li>
                                <li>Model I337</li>
                                <li>Package includes phone, charger, battery and user manual</li>
                                <li>Phone is 5.38 inches high x 2.75 inches wide x 0.13 inches deep and weighs a mere 4.59 oz </li>
                            </ul>  
                        
                    </div>
                </div>		
            </div>
        </div>
        <!--  -->
@endforeach

<link href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">

<script src="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js')}}"></script>
<script src="{{asset('//code.jquery.com/jquery-1.11.1.min.js')}}"></script>

<script>
$(document).ready(function(){
            //-- Click on detail
            $("ul.menu-items > li").on("click",function(){
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click",function(){
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            })      
                              
        })

       

</script>
<style>

/* ul > li{margin-right:25px;cursor:pointer} */
/* li.active{border-bottom:3px solid silver;} */

.item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
.menu-items{list-style-type:none;font-size:16px;display:inline-flex;margin-bottom:0;margin-top:20px}
.btn-success{width:100%;border-radius:0;}

.section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
.title-price{margin-top:30px;margin-bottom:0;color:black}
.title-attr{margin-top:0;margin-bottom:0;color:black;}

.btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
.btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;}

div.section > div {width:100%;display:inline-flex;}
div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
.attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
.attr.active,.attr2.active{ border:1px solid orange;}

@media (max-width: 426px) {
    /* .container {margin-top:0px !important;} */
    /* .container > .row{padding:0 !important;}
    .container > .row > .col-xs-12.col-sm-5{
        padding-right:0 ;    
    }
    .container > .row > .col-xs-12.col-sm-9 > div > p{
        padding-left:0 !important;
        padding-right:0 !important;
    }
    .container > .row > .col-xs-12.col-sm-9 > div > ul{
        padding-left:10px !important;
        
    }            
    .section{width:104%;}
    .menu-items{padding-left:0;} */
}
</style>
@endsection