<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
use App\Models\Order;
class CustomerController extends Controller
{
    public function AuthLogin()
    {
        // $admin_id = Session::get('admin_id');
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function all_customers()
    {
        $this->AuthLogin();

        $all_customer = DB::table('tbl_customers')
            ->orderby('tbl_customers.customer_id', 'desc')->get();
        
        return view('admin.all_customer')->with('all_customer', $all_customer);
    }

    public function tim_kiem_customer(Request $request){
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_customer = DB::table('tbl_customers')->where('customer_name', 'like', '%' . $keywords . '%')
                ->orWhere('customer_email', 'like', '%' . $keywords . '%')
                ->orWhere('customer_phone', 'like', '%' . $keywords . '%')
                ->get();

            $customer_ids = $search_customer->pluck('customer_id');
            $customer = Customer::whereIn('customer_id', $customer_ids)->paginate(5);

            return view('admin.search_customer')->with('search_customer', $search_customer)->with('keywords', $keywords)
                ->with(compact('customer'));
        } else {
            return Redirect::to('all-customers');
        }
    }

    // view orders customer - user
    public function vieworder_customer($customer_name){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        
        // $order = Order::orderby('created_at', 'desc')->where('customer_id', '')->get();
        
        $manage_order = DB::table('tbl_order')
            ->select('tbl_order.*', 'tbl_customers.*', 'tbl_order.created_at') // Thêm 'tbl_order.created_at' vào danh sách các cột
            ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_order.customer_id')
            ->where('tbl_customers.customer_name', $customer_name)
            ->orderby('tbl_order.created_at', 'desc')->get();

        return view('pages.order.vieworder_customer')->with('category', $cate_product)->with('brand', $brand_product)->with(compact('manage_order'));
    }

    public function viewdetails_order_customer($order_code){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        
        // $order = Order::orderby('created_at', 'desc')->where('customer_id', '')->get();
        
        $manage_details_order = DB::table('tbl_order_details')
            ->select('tbl_order_details.*', 'tbl_product.*', 'tbl_product.product_image')
            ->join('tbl_product', 'tbl_product.product_id', '=', 'tbl_order_details.product_id')
            ->where('tbl_order_details.order_code', $order_code)
            ->get();

        return view('pages.order.viewdetails_order_customer')->with('category', $cate_product)->with('brand', $brand_product)->with(compact('manage_details_order'));
    }
}
