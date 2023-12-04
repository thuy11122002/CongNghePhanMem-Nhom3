<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product);
    }

    public function search(Request $request){

        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();

        $search_product = DB::table('tbl_product')->where('product_name', 'like','%'.$keywords.'%')->get();
        return view('pages.sanpham.search')->with('category', $cate_product)->with('brand', $brand_product)->with('search_product', $search_product)->with('keywords', $keywords);

    }


    public function avanced_search(Request $request){


        $category_words = $request->category_submit;
        $brand_words = $request->brand_submit;
        $price_words = $request->price_submit;
        
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
// samsung tu thap den cao con loi

        if (is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_product = DB::table('tbl_product')->get();
        }elseif(is_null($category_words) && !is_null($brand_words) && !is_null($price_words)){
            if($price_words == 1){
                $search_product = DB::table('tbl_product')->where('brand_id', $brand_words)->orderby('product_price', 'asc')->get();
                }else{
                    $search_product = DB::table('tbl_product')->where('brand_id', $brand_words)->orderby('product_price', 'desc')->get();
                }
        }elseif(!is_null($category_words) && is_null($brand_words) && !is_null($price_words)){
            if($price_words == 1){
                $search_product = DB::table('tbl_product')->where('category_id', $category_words)->orderby('product_price', 'asc')->get();
                }else{
                    $search_product = DB::table('tbl_product')->where('category_id', $category_words)->orderby('product_price', 'desc')->get();
                }
        }elseif(!is_null($category_words) && !is_null($brand_words) && is_null($price_words)){
            $search_product = DB::table('tbl_product')->where('category_id', $category_words)->where('brand_id', $brand_words)->get();
            
        }elseif(!is_null($category_words) && !is_null($brand_words) && !is_null($price_words)){
            if($price_words == 1){
                $search_product = DB::table('tbl_product')->where('category_id', $category_words)->where('brand_id', $brand_words)->orderby('product_price', 'asc')->get();
                }else{
                    $search_product = DB::table('tbl_product')->where('category_id', $category_words)->where('brand_id', $brand_words)->orderby('product_price', 'desc')->get();
                }
        }elseif(!is_null($category_words) && is_null($brand_words) && is_null($price_words)){
            $search_product = DB::table('tbl_product')->where('category_id', $category_words)->get();
        }elseif(is_null($category_words) && !is_null($brand_words) && is_null($price_words)){
            $search_product = DB::table('tbl_product')->where('brand_id', $brand_words)->get();
        }elseif(is_null($category_words) && is_null($brand_words) && !is_null($price_words)){
            if($price_words == 1){
                    $search_product = DB::table('tbl_product')->orderby('product_price', 'asc')->get();
                }else{
                    $search_product = DB::table('tbl_product')->orderby('product_price', 'desc')->get();
                }
        }
       
        return view('pages.sanpham.avanced_search')
       ->with('category', $cate_product)
       ->with('brand', $brand_product)
       ->with('search_product', $search_product)
       ->with('category_words', $category_words)
       ->with('brand_words', $brand_words)
       ->with('price_words', $price_words);

    }

    public function tintuc_sanphammoi(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        return view('pages.tintuc.tintuc_details')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function tintuc_congnghe(){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        return view('pages.tintuc.congnghe_details')->with('category', $cate_product)->with('brand', $brand_product);
    }
}

