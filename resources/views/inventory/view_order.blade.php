@extends('inventory_layout')
@section('inventory_content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="tm-block-title d-inline-block">Liệt kê chi tiết đơn hàng</h2>
        </div>
    </div>
</div>

<head>
    <style>
        body {
            color: #566787;
            font-family: 'Roboto', sans-serif;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
            min-width: 100%;
        }

        .table-title h2 {
            margin: 8px 0 0;
            font-size: 22px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box input {
            height: 34px;
            border-radius: 20px;
            padding-left: 35px;
            border-color: #ddd;
            box-shadow: none;
        }

        .search-box input:focus {
            border-color: #3FBAE4;
        }

        .search-box i {
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child {
            width: 130px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 95%;
            width: 30px;
            height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 30px !important;
            text-align: center;
            padding: 0;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 6px;
            font-size: 95%;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Thông tin khách hàng</h2>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 text-left">
                            <h7 class="tm-block-title d-inline-block" style="color: red;">
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                            </h7>
                        </div>
                    </div>

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="">Tên khách hàng</th>
                                <th style="width: 381px;">Số điện thoại</th>
                                <th style="width: 483px;">Email</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$customer->customer_name}}</td>
                                <td>{{$customer->customer_phone}}</td>
                                <td>{{$customer->customer_email}}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <div style="margin-bottom: 50px"></div>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Thông tin vận chuyển hàng</h2>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 text-left">
                            <h7 class="tm-block-title d-inline-block" style="color: red;">
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                            </h7>
                        </div>
                    </div>

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 170px;">Tên người nhận hàng</th>
                                <th style="width: 290px;">Địa chỉ</th>
                                <th style="width: 125px;">Số điện thoại</th>
                                <th style="width: 100px;">Ghi chú</th>
                                <th>Hình thức thanh toán</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$shipping->shipping_name}}</td>
                                <td>{{$shipping->shipping_address}}</td>
                                <td>{{$shipping->shipping_phone}}</td>
                                <td>{{$shipping->shipping_note}}</td>

                                @php
                                    $payment = '';
                                    if($payment_method == 2){
                                        $payment = 'Thanh toán bằng tiền mặt';
                                    }
                                    
                                @endphp
                                <td>{{$payment}}</td>

                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 50px"></div>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Chi tiết đơn hàng</h2>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 text-left">
                            <h7 class="tm-block-title d-inline-block" style="color: red;">
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                            </h7>
                        </div>
                    </div>

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 80px">Thứ tự</th>
                                <th>Tên sản phẩm</th>
                                <th style="width: 160px">Số lượng kho còn</th>
                                <th style="width: 160px">Số lượng</th>
                                <th style="width: 160px">Giá</th>
                                <th style="width: 170px">Tổng tiền</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total_price = 0;
                            $i = 0;
                            @endphp

                            @foreach($order_details as $key => $details)
                            
                            <tr class="color_qty_{{$details->product_id}}">
                                <td>
                                    @php
                                        $i++;
                                    @endphp
                                    {{$i}}
                                </td>
                                <td>{{$details->product_name}}</td>
                                <td>{{$details->product->product_qty}}</td>
                                <td>
                                    <input type="number" min="1" {{$order_status == 2 ? 'disabled' : ''}} value="{{$details->product_sales_quantity}}" name="product_sales_quantity" class="input_qty order_qty_{{$details->product_id}}">
                                    
                                    <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->product->product_qty}}">

                                    <input type="hidden" name="order_code" class="order_code_input" value="{{$details->order_code}}">

                                    <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">

                                    @if($order_status!=2)
                                    <button data-product_id="{{$details->product_id}}" class="update_quantity_order_inventory" name="update_quantity_order" value="">Cập nhật</button>
                                    @endif
                                </td>
                                <td>{{number_format($details->product_price).' '.'VNĐ'}}</td>
                                <td>{{number_format($details->product_sales_quantity * $details->product_price).' '.'VNĐ'}}</td>
                            </tr>
                            @php
                            $total_price += $details->product_sales_quantity * $details->product_price;
                            @endphp
                            @endforeach

                        <tfoot>
                            <tr>
                                <td colspan="5"><strong>Tổng đơn hàng:</strong></td>
                                <td><strong>{{number_format($total_price).' '.'VNĐ'}}</strong></td>
                            </tr>
                        </tfoot>
                        <tr>

                           

                            <td colspan="6">
                                @if($order_status == 1)
                                <form action="">    
                                    {{csrf_field()}}
                                    <select name="" class="order_details_inventory">
                                        <option value="">----Chọn hình thức đơn hàng----</option>
                                        <option id="{{$details->order_id}}" value="1" selected>Chưa xử lý</option>
                                        <option id="{{$details->order_id}}" value="2">Đã xử lý - Đã giao hàng</option>
                                        <option id="{{$details->order_id}}" value="3">Hủy đơn hàng - Tạm giữ</option>
                                    </select>
                                </form>
                                @elseif($order_status == 2)
                                <form action="">
                                {{csrf_field()}}
                                    <select name="" class="order_details_inventory">
                                        <option value="">----Chọn hình thức đơn hàng----</option>
                                        <option id="{{$details->order_id}}" value="1">Chưa xử lý</option>
                                        <option id="{{$details->order_id}}" value="2" selected>Đã xử lý - Đã giao hàng</option>
                                        <option id="{{$details->order_id}}" value="3">Hủy đơn hàng - Tạm giữ</option>
                                    </select>
                                </form>
                                @else
                                <form action="">
                                {{csrf_field()}}
                                    <select name="" class="order_details_inventory">
                                        <option value="">----Chọn hình thức đơn hàng----</option>
                                        <option id="{{$details->order_id}}" value="1">Chưa xử lý</option>
                                        <option id="{{$details->order_id}}" value="2">Đã xử lý - Đã giao hàng</option>
                                        <option id="{{$details->order_id}}" value="3" selected>Hủy đơn hàng - Tạm giữ</option>
                                    </select>
                                </form>
                                @endif
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-right: 50px; float: right">
        <h5>
            <a href="{{URL::to('/print-order-inventory/'.$details->order_code)}}" style="text-decoration: none;" target="_blank_">In đơn hàng</a>
        </h5>
    </div>
</body>

</html>

@endsection
