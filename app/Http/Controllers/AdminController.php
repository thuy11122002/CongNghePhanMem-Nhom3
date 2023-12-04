<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

use App\Http\Requests;
use App\Models\Order;
use App\Models\Statistic;
use Auth;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
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

    public function index()
    {
        return view('admin.custom_auth.login_auth');
    }

    
    public function show_dashboard()
    {
        $this->AuthLogin();

        // Lấy ngày đầu và cuối của tháng hiện tại
        $startOfYear = Carbon::createFromDate(2023, 1, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate(2023, 12, 31)->endOfDay();

        $totalSales = DB::table('tbl_order')
        ->whereBetween('created_at', [$startOfYear, $endOfYear])
        ->where('order_status', 2)
        ->select(DB::raw('SUM(CAST(REPLACE(order_total, ",", ".") as float)) as total_sales'))
        ->value('total_sales');

        $totalProfit = DB::table('tbl_order')
        ->whereBetween('created_at', [$startOfYear, $endOfYear])
        ->where('order_status', 2)
        ->select(DB::raw('SUM(CAST(REPLACE(order_total, ",", ".") as float)) as total_sales'))
        ->value('total_sales');

        $totalOrder = DB::table('tbl_order')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->count('order_id');

        $totalNoProcess = DB::table('tbl_order')
            ->where('order_status', 1)
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->count('order_id');

        $statistical = DB::table('tbl_statistical')->get();

        return view('admin.dashboard')->with('statistical', $statistical)->with('totalSales', $totalSales)->with('totalProfit', $totalProfit)
            ->with('totalOrder', $totalOrder)
            ->with('totalNoProcess', $totalNoProcess);
    }


    public function dashboard(Request $request)
    {

        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_amin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Email hoac mat khau sai! Vui long nhap lai!');
            return Redirect::to('/admin');
        }
    }

    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }

    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistic::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();

        $chart_data = array(); // initialize the $chart_data variable

        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);
        // dd($request->all());
    }

    public function dashboard_filter(Request $request)
    {
        $data = $request->all();

        // echo $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();


        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        echo $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['dashboard_value'] == '7ngay') {
            $get = Statistic::whereBetween('order_date', [$sub7days, $now])->orderBy('order_date', 'ASC')->get();
        } elseif ($data['dashboard_value'] == 'thangtruoc') {
            $get = Statistic::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])->orderBy('order_date', 'ASC')->get();
        } elseif ($data['dashboard_value'] == 'thangnay') {
            $get = Statistic::whereBetween('order_date', [$dauthangnay, $now])->orderBy('order_date', 'ASC')->get();
        } else {
            $get = Statistic::whereBetween('order_date', [$sub365days, $now])->orderBy('order_date', 'ASC')->get();
        }

        $chart_data = array();

        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function get30days()
    {
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $cuoithangnay = Carbon::now('Asia/Ho_Chi_Minh')->endOfMonth()->toDateString();
        $get = Statistic::whereBetween('order_date', [$dauthangnay, $cuoithangnay])->orderBy('order_date', 'ASC')->get();
        $chart_data = array();

        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function order_date(Request $request)
    {
        $order_date = $_GET['date'];
        $order = Order::where('order_date', $order_date)->orderby('created_at', 'DESC')->get();
        return view('admin.order_date')->with(compact('order'));
    }

    

    
}
