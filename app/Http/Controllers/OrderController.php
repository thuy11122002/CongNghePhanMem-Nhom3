<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

session_start();

use App\Models\Order as ModelsOrder;
use App\Models\OrderDetails as ModelsOrderDetails;
use App\Models\Customer as ModelsCustomer;
use App\Models\Payment as ModelsPayment;
use App\Models\Product as ModelsProduct;
use App\Models\Shipping as ModelsShipping;


use Barryvdh\DomPDF\Facade\Pdf;
use Auth;

class OrderController extends Controller
{

    public function AuthLogin(){
        // $admin_id = Session::get('admin_id');
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function manage_order()
    {
        $this->AuthLogin();

        $order = ModelsOrder::orderby('created_at', 'desc')->get();
        return view('admin.manage_order')->with(compact('order'));
    }

    public function view_order($order_code)
    {
        $this->AuthLogin();
        
        $order_details = ModelsOrderDetails::where('order_code', $order_code)->get();
        $order = ModelsOrder::where('order_code', $order_code)->get();

        $order1 = ModelsOrder::where('order_code', $order_code)->first();
        $order_status = $order1->order_status;

        $payment = ModelsPayment::where('payment_id', $order1->payment_id)->first();
        $payment_method = $payment->payment_method;

        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }

        $customer = ModelsCustomer::where('customer_id', $customer_id)->first();
        $shipping = ModelsShipping::where('shipping_id', $shipping_id)->first();

        $order_details = ModelsOrderDetails::with('product')->where('order_code', $order_code)->get();
        // return view('admin.view_order')->with(compact('order_details', 'customer', 'shipping', 'order_details'));

        return view('admin.view_order')->with(compact('order_details', 'customer', 'shipping', 'order_details'))->with('payment_method', $payment_method)->with('order_status', $order_status);
    }

    public function print_order($checkout_code)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    public function print_order_convert($checkout_code)
    {

        $order_details = ModelsOrderDetails::where('order_code', $checkout_code)->get();
        $order = ModelsOrder::where('order_code', $checkout_code)->get();

        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }

        $customer = ModelsCustomer::where('customer_id', $customer_id)->first();
        $shipping = ModelsShipping::where('shipping_id', $shipping_id)->first();

        $order_details_product = ModelsOrderDetails::with('product')->where('order_code', $checkout_code)->get();


        $output = '';

        $output .=
            '<style>
                body{
        			font-family  : DejaVu Sans;
                    font-size: 0.9rem;
        		}
        		table, td, th {  
                    border: 1px solid #ddd;
                    text-align: left;
                  }
                  
                  table {
                    border-collapse: collapse;
                    width: 100%;
                  }
                  
                  th, td {
                    padding: 15px;
                  } 
                      
    		</style>
    		<h1><center>MOBILE SHOP</center></h1>
    		<h4><center>Hóa đơn bán hàng</center></h4>
            <p>Mã đơn hàng:  <strong>' . $ord->order_code . '</strong> </p>
            <p>Ngày đặt hàng: <strong>' . $ord->created_at . '</strong></p>
            <p>Nhân viên lập hóa đơn: Nguyễn Cẩm Ly</p>
            <br>
    		<p><strong>Người đặt hàng</strong></p>
    		<table class="table-styling">
				<thead>
					<tr>
						<th>Tên khách hàng</th>
						<th>Số điện thoại</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>';
        $output .= '		
					<tr>
						<td>' . $customer->customer_name . '</td>
						<td>' . $customer->customer_phone . '</td>
						<td>' . $customer->customer_email . '</td>
					</tr>';
        $output .= '				
				</tbody>
            </table>

    		<p><strong>Giao hàng tới</strong></p>
    			<table class="table-styling">
    				<thead>
    					<tr>
    						<th>Tên người nhận</th>
    						<th style="width: 120px">Địa chỉ</th>
    						<th>Sdt</th>
    						<th>Email</th>
    						<th>Ghi chú</th>
    					</tr>
    				</thead>
    				<tbody>';
        $output .= '		
    					<tr>
    						<td>' . $shipping->shipping_name . '</td>
    						<td>' . $shipping->shipping_address . '</td>
    						<td>' . $shipping->shipping_phone . '</td>
    						<td>' . $shipping->shipping_email . '</td>
    						<td>' . $shipping->shipping_notes . '</td>
    						
    					</tr>';


        $output .= '				
				    </tbody>
        		</table>
        		<p><strong>Đơn hàng đặt</strong></p>
        		<table class="table-styling">
    				<thead>
    					<tr>
                            <th>STT</th>
    						<th style="width: 200px">Tên sản phẩm</th>
    						<th>Số lượng</th>
    						<th>Giá sản phẩm</th>
    						<th>Thành tiền</th>
    					</tr>
    				</thead>
    				<tbody>';


        
        $total = 0;
        $i = 0;
        foreach ($order_details_product as $key => $product) {
            $subtotal      =     $product->product_price   *   $product->product_sales_quantity;
            $total         +=    $subtotal;
            $i++;
            $output .= '		
                        <tr>
                            <td>' . $i . '</td>
    						<td>' . $product->product_name . '</td>
    						<td>' . $product->product_sales_quantity . '</td>
    						<td>' . number_format($product->product_price, 0, ',', '.') . 'đ' . '</td>
    						<td>' . number_format($subtotal, 0, ',', '.') . 'đ' . '</td>
    						
    					</tr>
                        
                        
                    ';
        }

        $output .= '
                    <tr>
                        <td colspan="4"><strong>Tổng giá:</strong></td>
                        <td>' . number_format($total) . ' ' . 'VNĐ' . '</td>
                    </tr>
            	';

        $output .= '				
	          		</tbody>
                </table>
                
                <p>Ký tên</p>
    			<table style="border: none">
    				<thead>
    					<tr >
    						<th width="500px" style="border: none">Người lập phiếu</th>
    						<th width="200px" style="float:right; border: none">Người nhận</th>  						
    					</tr>

    				</thead>
    				<tbody>';
        $output .= '				
				    </tbody>
                </table>
		';


        return $output;
    }

    public function update_order_qty(Request $request)
    {
        $data = $request->all();
        $order = ModelsOrder::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        if ($order->order_status  ==  2) {          // order was treated
            $total_order      = 0;
            $quantity         = 0;
            $sales            = 0;
            $profit           = 0;
            //	    $now                =    Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product            =    ModelsProduct::find($product_id);
                $product_quantity   =    $product->product_qty;
                $product_sold       =    $product->product_sold;
                $product_price      =    $product->product_price;
                foreach ($data['qty'] as $key2 => $qty) {
                    if ($key == $key2) {      // key & key2  sort by 1 ,2 ,3 ...
                        $pro_remain                   =    $product_quantity - $qty;
                        $product->product_qty         =    $pro_remain;
                        $product->product_sold        =    $product_sold + $qty;
                        $product->save();
                    }
                }
            }
        }elseif($order->order_status  !=  2 && $order->order_status  !=  3){
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product            =    ModelsProduct::find($product_id);
                $product_quantity   =    $product->product_qty;
                $product_sold       =    $product->product_sold;
                $product_price      =    $product->product_price;
                foreach ($data['qty'] as $key2 => $qty) {
                    if ($key == $key2) {      // key & key2  sort by 1 ,2 ,3 ...
                        $pro_remain                   =    $product_quantity + $qty;
                        $product->product_qty         =    $pro_remain;
                        $product->product_sold        =    $product_sold - $qty;
                        $product->save();
                    }
                }
            }
        }
    
    
    
        
    }

    public function update_qty(Request $request){
        $data = $request->all();
        $order_details=ModelsOrderDetails::where('product_id', $data['order_product_id'])
        ->where('order_code', $data['order_code'])->first();
        $order_details->product_sales_quantity = $data['order_qty'];
        $order_details->save();
    }

    public function tim_kiem_manageorder(Request $request){
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_order = DB::table('tbl_order')->where('order_code', 'like', '%' . $keywords . '%')
                ->get();

            // $customer = Customer::whereIn('customer_id', $customer_ids)->paginate(5);

            return view('admin.search_order')->with('search_order', $search_order)->with('keywords', $keywords);
        } else {
            return Redirect::to('manage-order');
        }
    }

    // inventory
    public function manage_order_inventory()
    {
        // $this->AuthLogin();
        $order = ModelsOrder::orderby('created_at', 'desc')->get();
        return view('inventory.manage_order')->with(compact('order'));
    }
    
    public function tim_kiem_manageorder_inventory(Request $request){
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_order = DB::table('tbl_order')->where('order_code', 'like', '%' . $keywords . '%')
                ->get();

            // $customer_ids = $search_customer->pluck('customer_id');
            // $customer = Customer::whereIn('customer_id', $customer_ids)->paginate(5);

            return view('inventory.search_order')->with('search_order', $search_order)->with('keywords', $keywords);
        } else {
            return Redirect::to('manage-order-inventory');
        }
    }

    public function view_order_inventory($order_code)
    {
        // $this->AuthLogin();
        
        $order_details = ModelsOrderDetails::where('order_code', $order_code)->get();
        $order = ModelsOrder::where('order_code', $order_code)->get();

        $order1 = ModelsOrder::where('order_code', $order_code)->first();
        $order_status = $order1->order_status;

        $payment = ModelsPayment::where('payment_id', $order1->payment_id)->first();
        $payment_method = $payment->payment_method;

        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }

        $customer = ModelsCustomer::where('customer_id', $customer_id)->first();
        $shipping = ModelsShipping::where('shipping_id', $shipping_id)->first();

        $order_details = ModelsOrderDetails::with('product')->where('order_code', $order_code)->get();
        // return view('admin.view_order')->with(compact('order_details', 'customer', 'shipping', 'order_details'));

        return view('inventory.view_order')->with(compact('order_details', 'customer', 'shipping', 'order_details'))->with('payment_method', $payment_method)->with('order_status', $order_status);
    }

    public function print_order_inventory($checkout_code)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert_inventory($checkout_code));
        return $pdf->stream();
    }

    public function print_order_convert_inventory($checkout_code)
    {

        $order_details = ModelsOrderDetails::where('order_code', $checkout_code)->get();
        $order = ModelsOrder::where('order_code', $checkout_code)->get();

        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }

        $customer = ModelsCustomer::where('customer_id', $customer_id)->first();
        $shipping = ModelsShipping::where('shipping_id', $shipping_id)->first();

        $order_details_product = ModelsOrderDetails::with('product')->where('order_code', $checkout_code)->get();


        $output = '';

        $output .=
            '<style>
                body{
        			font-family  : DejaVu Sans;
                    font-size: 0.9rem;
        		}
        		table, td, th {  
                    border: 1px solid #ddd;
                    text-align: left;
                  }
                  
                  table {
                    border-collapse: collapse;
                    width: 100%;
                  }
                  
                  th, td {
                    padding: 15px;
                  } 
                      
    		</style>
    		<h1><center>MOBILE SHOP</center></h1>
    		<h4><center>Hóa đơn bán hàng</center></h4>
            <p>Mã đơn hàng:  <strong>' . $ord->order_code . '</strong> </p>
            <p>Ngày đặt hàng: <strong>' . $ord->created_at . '</strong></p>
            <p>Nhân viên lập hóa đơn: Nguyễn Cẩm Ly</p>
            <br>
    		<p><strong>Người đặt hàng</strong></p>
    		<table class="table-styling">
				<thead>
					<tr>
						<th>Tên khách hàng</th>
						<th>Số điện thoại</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>';
        $output .= '		
					<tr>
						<td>' . $customer->customer_name . '</td>
						<td>' . $customer->customer_phone . '</td>
						<td>' . $customer->customer_email . '</td>
					</tr>';
        $output .= '				
				</tbody>
            </table>

    		<p><strong>Giao hàng tới</strong></p>
    			<table class="table-styling">
    				<thead>
    					<tr>
    						<th>Tên người nhận</th>
    						<th style="width: 120px">Địa chỉ</th>
    						<th>Sdt</th>
    						<th>Email</th>
    						<th>Ghi chú</th>
    					</tr>
    				</thead>
    				<tbody>';
        $output .= '		
    					<tr>
    						<td>' . $shipping->shipping_name . '</td>
    						<td>' . $shipping->shipping_address . '</td>
    						<td>' . $shipping->shipping_phone . '</td>
    						<td>' . $shipping->shipping_email . '</td>
    						<td>' . $shipping->shipping_notes . '</td>
    						
    					</tr>';


        $output .= '				
				    </tbody>
        		</table>
        		<p><strong>Đơn hàng đặt</strong></p>
        		<table class="table-styling">
    				<thead>
    					<tr>
                            <th>STT</th>
    						<th style="width: 200px">Tên sản phẩm</th>
    						<th>Số lượng</th>
    						<th>Giá sản phẩm</th>
    						<th>Thành tiền</th>
    					</tr>
    				</thead>
    				<tbody>';


        
        $total = 0;
        $i = 0;
        foreach ($order_details_product as $key => $product) {
            $subtotal      =     $product->product_price   *   $product->product_sales_quantity;
            $total         +=    $subtotal;
            $i++;
            $output .= '		
                        <tr>
                            <td>' . $i . '</td>
    						<td>' . $product->product_name . '</td>
    						<td>' . $product->product_sales_quantity . '</td>
    						<td>' . number_format($product->product_price, 0, ',', '.') . 'đ' . '</td>
    						<td>' . number_format($subtotal, 0, ',', '.') . 'đ' . '</td>
    						
    					</tr>
                        
                        
                    ';
        }

        $output .= '
                    <tr>
                        <td colspan="4"><strong>Tổng giá:</strong></td>
                        <td>' . number_format($total) . ' ' . 'VNĐ' . '</td>
                    </tr>
            	';

        $output .= '				
	          		</tbody>
                </table>
                
                <p>Ký tên</p>
    			<table style="border: none">
    				<thead>
    					<tr >
    						<th width="500px" style="border: none">Người lập phiếu</th>
    						<th width="200px" style="float:right; border: none">Người nhận</th>  						
    					</tr>

    				</thead>
    				<tbody>';
        $output .= '				
				    </tbody>
                </table>
		';


        return $output;
    }
    


    public function update_order_qty_inventory(Request $request)
    {
        $data = $request->all();
        $order = ModelsOrder::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        if ($order->order_status  ==  2) {          // order was treated
            $total_order      = 0;
            $quantity         = 0;
            $sales            = 0;
            $profit           = 0;
            //	    $now                =    Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product            =    ModelsProduct::find($product_id);
                $product_quantity   =    $product->product_qty;
                $product_sold       =    $product->product_sold;
                $product_price      =    $product->product_price;
                foreach ($data['qty'] as $key2 => $qty) {
                    if ($key == $key2) {      // key & key2  sort by 1 ,2 ,3 ...
                        $pro_remain                   =    $product_quantity - $qty;
                        $product->product_qty         =    $pro_remain;
                        $product->product_sold        =    $product_sold + $qty;
                        $product->save();
                    }
                }
            }
        }elseif($order->order_status  !=  2 && $order->order_status  !=  3){
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product            =    ModelsProduct::find($product_id);
                $product_quantity   =    $product->product_qty;
                $product_sold       =    $product->product_sold;
                $product_price      =    $product->product_price;
                foreach ($data['qty'] as $key2 => $qty) {
                    if ($key == $key2) {      // key & key2  sort by 1 ,2 ,3 ...
                        $pro_remain                   =    $product_quantity + $qty;
                        $product->product_qty         =    $pro_remain;
                        $product->product_sold        =    $product_sold - $qty;
                        $product->save();
                    }
                }
            }
        }
    }

    public function update_qty_inventory(Request $request){
        $data = $request->all();
        $order_details=ModelsOrderDetails::where('product_id', $data['order_product_id'])
        ->where('order_code', $data['order_code'])->first();
        $order_details->product_sales_quantity = $data['order_qty'];
        $order_details->save();
    }

}
