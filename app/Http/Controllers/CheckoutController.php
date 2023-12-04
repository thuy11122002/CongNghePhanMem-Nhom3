<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Models\Order as ModelsOrder;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();
use PDF;
use Auth;

class CheckoutController extends Controller
{
    public function AuthLogin(){
       
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function login_checkout(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();

        return view('pages.checkout.login_checkout')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function signup_checkout(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();

        return view('pages.checkout.signup_checkout')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return Redirect('/checkout');
    }

    public function checkout(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();

        return view('pages.checkout.show_checkout')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function save_checkout_customer(Request $request){

        $shippingNote = trim($request->input('shipping_note')) !== "" ? $request->input('shipping_note') : "";
        
            $data = array();
            $data['shipping_name'] = $request->shipping_name;
            $data['shipping_phone'] = $request->shipping_phone;
            $data['shipping_email'] = $request->shipping_email;
            $data['shipping_note'] = $shippingNote;
            $data['shipping_address'] = $request->shipping_address;
            $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        
            Session::put('shipping_id', $shipping_id);

            return Redirect('/payment');
        
    }

    public function payment(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        return view('pages.checkout.payment')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function logout_checkout(){
        Session::flush(); 
        return Redirect('/login-checkout');
    }

    public function login_customer(Request $request){
        $email = $request -> email_account;
        $password = md5($request -> password_account);
        $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $password)->first();
        if($result){
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);

            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/logout-checkout');

        }
    }

    public function order_place(Request $request){
        // $content = Cart::content();
        // echo $content;
        
        // insert payment method

        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 1;
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        // insert order 

        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = floatval(str_replace(',', '', Cart::subtotal()));

        $order_data['order_status'] = 1;
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $order_data['created_at'] = date('Y-m-d H:i:s');

        // reset timezone to default
        date_default_timezone_set(date_default_timezone_get());

        // generate unique order code
        do {
            $order_code = substr(uniqid(), 0, 8);
            $order_exists = DB::table('tbl_order')->where('order_code', $order_code)->exists();
        } while ($order_exists);
        
        $order_data['order_code'] = $order_code;
        
        $order_id = DB::table('tbl_order')->insertGetId($order_data);
       

        // insert order details

        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            $order_d_data['order_code'] = $order_code;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        
        

        if($data['payment_method']==1){
            echo 'Thanh Toán Bằng ATM';
        }elseif($data['payment_method']==2){
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
            return view('pages.checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);

        }else{
            echo 'Thẻ ghi nợ';
        }

        return Redirect('/payment');
    }

    // public function manage_order(){
    //     $this->AuthLogin();

    //     $all_order = DB::table('tbl_order')
    //     ->join('tbl_customers','tbl_order.customer_id', '=', 'tbl_customers.customer_id')
    //     ->select('tbl_order.*', 'tbl_customers.customer_name')
    //     ->orderby('tbl_order.order_id', 'desc')->get();
    //     $manager_order = view('admin.manage_order')->with('all_order', $all_order);
    //     return view('/admin_layout')->with('admin.manage_order', $manager_order);
    // }


    // public function view_order($orderId){
    //     $this->AuthLogin();
    //     // $order_details = DB::table('tbl_order_details')
    //     //     ->where('order_id', $orderId)
    //     //     ->get();
    
    //     $order_details = DB::table('tbl_order_details')
    //         ->join('tbl_product','tbl_order_details.product_id', '=', 'tbl_product.product_id')
    //         ->where('order_id', $orderId)
    //         ->get();

        
    //     $order_by_id = DB::table('tbl_order')
    //         ->join('tbl_customers','tbl_order.customer_id', '=', 'tbl_customers.customer_id')
    //         ->join('tbl_shipping','tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
    //         ->select('tbl_order.*', 'tbl_customers.*','tbl_shipping.*')
    //         ->where('tbl_order.order_id', $orderId)
    //         ->first();

    //     $manager_order_by_id = view('admin.view_order')
    //         ->with('order_by_id', $order_by_id)
    //         ->with('order_details', $order_details);
    
    //     return view('/admin_layout')
    //         ->with('admin.view_order', $manager_order_by_id);
    // }

    


    // public function update_order_qty(Request $request){
    //     $data = $request->all();
    //     // $order = DB::table('tbl_order')->where('order_id', $data['order_id'])->first();
    //     $order = ModelsOrder::find($data['order_id']);
    //     $order->order_status = $data['order_status'];
    //     $order->save();
    // }

    
}

