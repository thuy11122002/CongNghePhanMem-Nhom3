<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class ReportController extends Controller
{
    //
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

    // public function import_product_qty(Request $request)
    // {  
    //     $product_id = $request->input('product_id');
    //     $product_qty_import = $request->input('product_qty_import');

    //     // echo $product_id;
    //     // echo $product_qty_import;

    //     $current_qty = DB::table('tbl_product')->where('product_id', $product_id)->select('product_qty')->first()->product_qty;


    //     $new_qty = $current_qty + $product_qty_import;

    //     DB::table('tbl_product')->where('product_id', $product_id)->update(['product_qty' => $new_qty]);

    //     return view('admin.report');

    // }

    public function import_product_qty(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty_import = $request->input('product_qty_import');

        $current_qty = DB::table('tbl_product')->where('product_id', $product_id)->value('product_qty');
        $new_qty = $current_qty + $product_qty_import;

        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_qty' => $new_qty]);
        return response()->json(['success' => true]);
    }

    public function report(){

        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->where('tbl_product.product_qty', '<', 5)
        ->orderby('tbl_product.product_id', 'desc')
        ->get();
        
        return view('admin.report')->with('all_product', $all_product);
    }

    public function tim_kiem_report(Request $request){
        $keywords = $request->keywords_submit;
        if ($keywords) {

            $search_all_report = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('product_name', 'like', '%' . $keywords . '%')
            ->where('tbl_product.product_qty', '<', 5)
            ->orderby('tbl_product.product_id', 'desc')
            ->get();
            return view('admin.search_report')->with('search_all_report', $search_all_report)->with('keywords', $keywords);
        } else {
            return Redirect::to('report');
        }
    }

    public function tim_kiem_nang_cao_report(Request $request){
        $category_words = $request->category_submit;
        $brand_words = $request->brand_submit;
        $price_words = $request->price_submit;

        if (is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_all_report = DB::table('tbl_product')->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_product.product_qty', '<', 5)
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && !is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'DESC')
                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {

                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'DESC')
                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && !is_null($brand_words) && is_null($price_words)) {
            $search_all_report = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')

                ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                ->distinct()
                ->get();
        } elseif (!is_null($category_words) && !is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')

                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'DESC')

                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_all_report = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->where('tbl_product.product_qty', '<', 5)
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && !is_null($brand_words) && is_null($price_words)) {

            $search_all_report = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                ->distinct()
                ->get();
        } elseif (is_null($category_words) && is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_product.product_qty', '<', 5)
                    
                    ->distinct()
                    ->orderby('product_price', 'ASC')
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_product.product_qty', '<', 5)
                    
                    ->distinct()
                    ->orderby('product_price', 'DESC')
                    ->get();
            }
        }

        return view('admin.search_report')
            ->with('search_all_report', $search_all_report)
            ->with('category_words', $category_words)
            ->with('brand_words', $brand_words)
            ->with('price_words', $price_words);

    }
    
    // inventory
    public function report_inventory(){

        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->where('tbl_product.product_qty', '<', 5)
        ->orderby('tbl_product.product_id', 'desc')
        ->get();
        
        return view('inventory.report')->with('all_product', $all_product);
    }

    public function tim_kiem_report_inventory(Request $request){
        $keywords = $request->keywords_submit;
        if ($keywords) {

            $search_all_report = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('product_name', 'like', '%' . $keywords . '%')
            ->where('tbl_product.product_qty', '<', 5)
            ->orderby('tbl_product.product_id', 'desc')
            ->get();
            return view('inventory.search_report')->with('search_all_report', $search_all_report)->with('keywords', $keywords);
        } else {
            return Redirect::to('report-inventory');
        }
    }

    public function tim_kiem_nang_cao_report_inventory(Request $request){
        $category_words = $request->category_submit;
        $brand_words = $request->brand_submit;
        $price_words = $request->price_submit;

        if (is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_all_report = DB::table('tbl_product')->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_product.product_qty', '<', 5)
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && !is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'DESC')
                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {

                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'DESC')
                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && !is_null($brand_words) && is_null($price_words)) {
            $search_all_report = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')

                ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                ->distinct()
                ->get();
        } elseif (!is_null($category_words) && !is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')

                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                    ->orderby('product_price', 'DESC')

                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_all_report = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->where('tbl_product.product_qty', '<', 5)
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && !is_null($brand_words) && is_null($price_words)) {

            $search_all_report = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->where('tbl_product.product_qty', '<', 5)

                ->distinct()
                ->get();
        } elseif (is_null($category_words) && is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_product.product_qty', '<', 5)
                    
                    ->distinct()
                    ->orderby('product_price', 'ASC')
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_product.product_qty', '<', 5)
                    
                    ->distinct()
                    ->orderby('product_price', 'DESC')
                    ->get();
            }
        }

        return view('inventory.search_report')
            ->with('search_all_report', $search_all_report)
            ->with('category_words', $category_words)
            ->with('brand_words', $brand_words)
            ->with('price_words', $price_words);

    }

    public function import_product_qty_inventory(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty_import = $request->input('product_qty_import');

        $current_qty = DB::table('tbl_product')->where('product_id', $product_id)->value('product_qty');
        $new_qty = $current_qty + $product_qty_import;

        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_qty' => $new_qty]);
        return response()->json(['success' => true]);
    }



    public function report_add_inventory(){

        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->orderby('tbl_product.product_id', 'desc')
        // ->paginate(10);
        ->get();
        
        return view('inventory.report_all')->with('all_product', $all_product);
    }

    public function tim_kiem_report_inventory_all(Request $request){
        $keywords = $request->keywords_submit;
        if ($keywords) {

            $search_all_report = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('product_name', 'like', '%' . $keywords . '%')
            ->orderby('tbl_product.product_id', 'desc')
            ->get();
            return view('inventory.search_report_all')->with('search_all_report', $search_all_report)->with('keywords', $keywords);
        } else {
            return Redirect::to('report-add-inventory');
        }
    }

    public function tim_kiem_nang_cao_report_inventory_all(Request $request){
        $category_words = $request->category_submit;
        $brand_words = $request->brand_submit;
        $price_words = $request->price_submit;

        if (is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_all_report = DB::table('tbl_product')->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && !is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'DESC')
                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {

                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->orderby('product_price', 'DESC')
                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && !is_null($brand_words) && is_null($price_words)) {
            $search_all_report = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')

                ->distinct()
                ->get();
        } elseif (!is_null($category_words) && !is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')

                    ->orderby('product_price', 'DESC')

                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_all_report = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && !is_null($brand_words) && is_null($price_words)) {

            $search_all_report = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->distinct()
                    ->orderby('product_price', 'ASC')
                    ->get();
            } else {
                $search_all_report = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->distinct()
                    ->orderby('product_price', 'DESC')
                    ->get();
            }
        }

        return view('inventory.search_report_all')
            ->with('search_all_report', $search_all_report)
            ->with('category_words', $category_words)
            ->with('brand_words', $brand_words)
            ->with('price_words', $price_words);

    }

    public function import_product_qty_inventory_all(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty_import = $request->input('product_qty_import');

        $current_qty = DB::table('tbl_product')->where('product_id', $product_id)->value('product_qty');
        $new_qty = $current_qty + $product_qty_import;

        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_qty' => $new_qty]);
        return response()->json(['success' => true]);
    }
}
