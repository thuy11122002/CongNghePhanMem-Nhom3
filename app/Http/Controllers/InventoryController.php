<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Carbon\Carbon;
use Auth;

class InventoryController extends Controller
{

    // public function AuthLogin(){
    //     // $admin_id = Session::get('admin_id');
    //     $admin_id = Auth::id();
    //     if($admin_id){
    //         return Redirect::to('dashboard');
    //     }else{
    //         return Redirect::to('admin')->send();
    //     }
    // }

    public function index(){
        return view('inventory_login');
    }

    public function show_dashboard(){
        // $this->AuthLogin();
        
        $startOfYear = Carbon::createFromDate(2023, 1, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate(2023, 12, 31)->endOfDay();

        // Tính tổng doanh số trong khoảng thời gian từ ngày 1 đến ngày 30 của tháng hiện tại
        $totalNeedImport = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.product_qty', '<', 5)
            ->orderBy('tbl_product.product_id', 'desc')
            ->count('tbl_product.product_id');

        $productsWithoutOrder = DB::table('tbl_product')
            ->leftJoin('tbl_order_details', 'tbl_product.product_id', '=', 'tbl_order_details.product_id')
            ->select('tbl_product.*')
            ->whereNull('tbl_order_details.product_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->count('tbl_product.product_id');

        $totalImport = DB::table('tbl_product')
            // ->whereBetween('order_date', [$startOfMonth, $endOfMonth])
            ->selectRaw('SUM(product_price * product_qty) as total_import')
            ->value('total_import');
        
            
        $totalExport = DB::table('tbl_order')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->where('order_status', 2)
            ->select(DB::raw('SUM(CAST(REPLACE(order_total, ",", ".") as float)) as total_sales'))
            ->value('total_sales');

            
        $statistical = DB::table('tbl_statistical')->get();

        return view('inventory.dashboard_inven')
            ->with('totalImport', $totalImport)
            ->with('totalExport', $totalExport)
            ->with('totalNeedImport', $totalNeedImport)
            ->with('productsWithoutOrder', $productsWithoutOrder);
    }

    public function logout(){
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/inventory');

    } 

    public function dashboard(Request $request){
        $admin_email = $request -> admin_email;
        $admin_password = md5($request -> admin_password) ;

        $result = DB::table('tbl_amin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard-inven');
        }else{  
            Session::put('message', 'Email hoac mat khau sai! Vui long nhap lai!');
            return Redirect::to('/inventory');
        }
    } 
}
